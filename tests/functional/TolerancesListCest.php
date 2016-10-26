<?php


class TolerancesListCest
{
    public $ranges;
    public $qualities;
    public $fields;
    public $systems;
    public $tolerances;

    public function _before(FunctionalTester $I)
    {
        $this->systems = ['hole', 'shaft'];
        $this->ranges = factory(App\Models\Range::class, 3)->create();
        $this->qualities = factory(App\Models\Quality::class, 3)->create();
        $this->fields = factory(App\Models\Field::class, 3)->create();
        $this->tolerances = [
            factory(App\Models\Tolerance::class)->create([
                'range_id' => $this->ranges[0]->id,
                'system' => $this->systems[0],
                'quality_id' => $this->qualities[0]->id,
                'field_id' => $this->fields[1]->id,
            ]),
            factory(App\Models\Tolerance::class)->create([
                'range_id' => $this->ranges[0]->id,
                'system' => $this->systems[0],
                'quality_id' => $this->qualities[2]->id,
                'field_id' => $this->fields[2]->id,
            ]),
            factory(App\Models\Tolerance::class)->create([
                'range_id' => $this->ranges[2]->id,
                'system' => $this->systems[1],
                'quality_id' => $this->qualities[0]->id,
                'field_id' => $this->fields[1]->id,
            ]),
        ];
    }

    public function tolerancesList(FunctionalTester $I)
    {
        $I->wantTo('get grid of ranges, systems, qualities, fielda and tolerances');
        $admin = factory(App\Models\User::class, 'admin')->create();
        $I->amLoggedAs($admin);
        $I->sendAjaxGetRequest('admin/api/v1/tolerances');
        $I->seeArray($this->resultArray());
        $I->seeResponseCodeIs(200);
    }

    protected function resultArray()
    {
        $r = $this->ranges;
        $q = $this->qualities;
        $f = $this->fields;
        $t = $this->tolerances;
        $s = $this->systems;

        return [
            "{$r[0]->id}" => [ # range 0
                'id' => $r[0]->id,
                'type' => 'range',
                'max' => $r[0]->max_val,
                'min' => $r[0]->min_val,
                'systems' => [
                    $s[0] => [ # system 0
                        'type' => 'system',
                        'title' => $s[0],
                        'qualities' => [
                            "{$q[0]->id}" => [ # quality 0
                                'id' => $q[0]->id,
                                'type' => 'quality',
                                'title' => "{$q[0]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => $t[0]->id,
                                            'type' => 'tolerance',
                                            'max' => $t[0]->max_val,
                                            'min' => $t[0]->min_val,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 0 END
                            "{$q[1]->id}" => [ # quality 1
                                'id' => $q[1]->id,
                                'type' => 'quality',
                                'title' => "{$q[1]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 1 END
                            "{$q[2]->id}" => [ # quality 2
                                'id' => $q[2]->id,
                                'type' => 'quality',
                                'title' => "{$q[2]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => $t[1]->id,
                                            'type' => 'tolerance',
                                            'max' => $t[1]->max_val,
                                            'min' => $t[1]->min_val,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 2 END
                        ],
                    ], # system 0 END
                    $s[1] => [ # system 1
                        'type' => 'system',
                        'title' => $s[1],
                        'qualities' => [
                            "{$q[0]->id}" => [ # quality 0
                                'id' => $q[0]->id,
                                'type' => 'quality',
                                'title' => "{$q[0]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 0 END
                            "{$q[1]->id}" => [ # quality 1
                                'id' => $q[1]->id,
                                'type' => 'quality',
                                'title' => "{$q[1]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 1 END
                            "{$q[2]->id}" => [ # quality 2
                                'id' => $q[2]->id,
                                'type' => 'quality',
                                'title' => "{$q[2]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 2 END
                        ],
                    ], # system 1 END
                ],
            ], # range 0 END
            "{$r[1]->id}" => [ # range 1
                'id' => $r[1]->id,
                'type' => 'range',
                'max' => $r[1]->max_val,
                'min' => $r[1]->min_val,
                'systems' => [
                    $s[0] => [ # system 0
                        'type' => 'system',
                        'title' => $s[0],
                        'qualities' => [
                            "{$q[0]->id}" => [ # quality 0
                                'id' => $q[0]->id,
                                'type' => 'quality',
                                'title' => "{$q[0]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 0 END
                            "{$q[1]->id}" => [ # quality 1
                                'id' => $q[1]->id,
                                'type' => 'quality',
                                'title' => "{$q[1]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 1 END
                            "{$q[2]->id}" => [ # quality 2
                                'id' => $q[2]->id,
                                'type' => 'quality',
                                'title' => "{$q[2]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 2 END
                        ],
                    ], # system 0 END
                    $s[1] => [ # system 1
                        'type' => 'system',
                        'title' => $s[1],
                        'qualities' => [
                            "{$q[0]->id}" => [ # quality 0
                                'id' => $q[0]->id,
                                'type' => 'quality',
                                'title' => "{$q[0]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 0 END
                            "{$q[1]->id}" => [ # quality 1
                                'id' => $q[1]->id,
                                'type' => 'quality',
                                'title' => "{$q[1]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 1 END
                            "{$q[2]->id}" => [ # quality 2
                                'id' => $q[2]->id,
                                'type' => 'quality',
                                'title' => "{$q[2]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 2 END
                        ],
                    ], # system 1 END
                ],
            ], # range 1 END
            "{$r[2]->id}" => [ # range 2
                'id' => $r[2]->id,
                'type' => 'range',
                'max' => $r[2]->max_val,
                'min' => $r[2]->min_val,
                'systems' => [
                    $s[0] => [ # system 0
                        'type' => 'system',
                        'title' => $s[0],
                        'qualities' => [
                            "{$q[0]->id}" => [ # quality 0
                                'id' => $q[0]->id,
                                'type' => 'quality',
                                'title' => "{$q[0]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 0 END
                            "{$q[1]->id}" => [ # quality 1
                                'id' => $q[1]->id,
                                'type' => 'quality',
                                'title' => "{$q[1]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 1 END
                            "{$q[2]->id}" => [ # quality 2
                                'id' => $q[2]->id,
                                'type' => 'quality',
                                'title' => "{$q[2]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 2 END
                        ],
                    ], # system 0 END
                    $s[1] => [ # system 1
                        'type' => 'system',
                        'title' => $s[1],
                        'qualities' => [
                            "{$q[0]->id}" => [ # quality 0
                                'id' => $q[0]->id,
                                'type' => 'quality',
                                'title' => "{$q[0]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => $t[2]->id,
                                            'type' => 'tolerance',
                                            'max' => $t[2]->max_val,
                                            'min' => $t[2]->min_val,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 0 END
                            "{$q[1]->id}" => [ # quality 1
                                'id' => $q[1]->id,
                                'type' => 'quality',
                                'title' => "{$q[1]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 1 END
                            "{$q[2]->id}" => [ # quality 2
                                'id' => $q[2]->id,
                                'type' => 'quality',
                                'title' => "{$q[2]->value}",
                                'fields' => [
                                    "{$f[0]->id}" => [ # field 0
                                        'id' => $f[0]->id,
                                        'type' => 'quality',
                                        'title' => $f[0]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 0 END
                                    "{$f[1]->id}" => [ # field 1
                                        'id' => $f[1]->id,
                                        'type' => 'quality',
                                        'title' => $f[1]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 1 END
                                    "{$f[2]->id}" => [ # field 2
                                        'id' => $f[2]->id,
                                        'type' => 'quality',
                                        'title' => $f[2]->value,
                                        'tolerance' => [
                                            'id' => NULL,
                                            'type' => 'tolerance',
                                            'max' => NULL,
                                            'min' => NULL,
                                        ],
                                    ], # field 2 END
                                ],
                            ], # quality 2 END
                        ],
                    ], # system 1 END
                ],
            ], # range 2 END
        ];
    }
}
