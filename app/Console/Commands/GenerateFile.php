<?php

namespace App\Console\Commands;

use App\Models\Tolerance;
use App\Models\TolerancesView;
use Illuminate\Console\Command;
use Illuminate\Filesystem\FilesystemManager;

class GenerateFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:file {format=json}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates tolerances file in specified format [json|xml]';

    /**
     * @var FilesystemManager
     */
    protected $filesystem;

    /**
     * @var string
     */
    protected $filename = 'GOST-25347-82';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FilesystemManager $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $format = $this->argument('format');
        $content = '';

        switch ($format) {
            case 'json':
                $content = $this->createJson();
                break;
            case 'xml':
                $content = $this->createXML();
                break;
            default:
                $this->error('Parameter \'format\' has to be one of: json|xml');
                return false;
        }

        $this->filesystem->disk('downloads')->put("{$this->filename}.{$format}", $content);


    }

    /**
     * @return string
     */
    protected function createJson()
    {
        return json_encode($this->getArray());
    }

    protected function createXML()
    {
        $ranges = $this->getArray();
        $xml = new \SimpleXMLElement('<ranges/>');

        foreach ($ranges as $range) {
            $xmlRange = $xml->addChild('range');
            $xmlRange->addChild('min_size', $range['min_size']);
            $xmlRange->addChild('max_size', $range['max_size']);
            $xmlZones = $xmlRange->addChild('zones');
            foreach ($range['zones'] as $zone => $tolerances) {
                $xmlZone = $xmlZones->addChild($zone);
                $xmlZone->addAttribute('max_tolerance', $tolerances['max_tolerance']);
                $xmlZone->addAttribute('min_tolerance', $tolerances['min_tolerance']);
            }
        }

        return $xml->asXML();
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        $result = [];
        $tolerances = TolerancesView::all();
        foreach ($tolerances as $tolerance) {
            if (!isset($result[$tolerance->max_size])) {
                $result[$tolerance->max_size] = [
                    'min_size' => $tolerance->min_size,
                    'max_size' => $tolerance->max_size,
                    'zones' => [],
                ];
            }
            $zone = ($tolerance->system == Tolerance::SYSTEM_HOLE ? strtoupper($tolerance->field) : $tolerance->field) .
                $tolerance->quality;
            $result[$tolerance->max_size]['zones'][$zone] = [
                'max_tolerance' => $tolerance->max_val,
                'min_tolerance' => $tolerance->min_val,
            ];
        }
        return $result;
    }
}
