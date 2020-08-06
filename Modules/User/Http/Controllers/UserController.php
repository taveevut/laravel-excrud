<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Article;
use Modules\Student\Entities\Student;

class UserController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['body'] = [
            'title'     => 'Dashboard',
            'name'      => 'dasboard',
            'app_title' => [
                'h1' => 'Dashboard',
                'p'  => 'ภาพรวมของระบบ'
            ]
        ];
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = $this->data;
        $data['count_student'] = Student::count();
        $data['count_article'] = Article::count();
        $data['getChartsJS'] = $this->getChartsJS();

        return view('user::dashboard', $data);
    }

    public function randomScalingFactor()
    {
        return rand(-100, 100);
    }

    private function getChartsJS(){
        $config = array(
            'type'    => 'line',
            'data'    => array(
                'labels'   => array('January', 'February', 'March', 'April', 'May', 'June', 'July'),
                'datasets' => array(
                    array(
                        'label'           => 'My First dataset',
                        'backgroundColor' => 'rgb(54, 162, 235)',
                        'borderColor'     => 'rgb(54, 162, 235)',
                        'data'            => array(
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor()
                        ),
                        'fill'            => false
                    ),
                    array(
                        'label'           => 'My Socond dataset',
                        'backgroundColor' => 'rgb(255, 99, 132)',
                        'borderColor'     => 'rgb(255, 99, 132)',
                        'data'            => array(
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor(),
                            $this->randomScalingFactor()
                        ),
                        'fill'            => false
                    )
                )
            ),
            'options' => array(
                'responsive' => true,
                'title'      => array(
                    'display' => true,
                    'text'    => 'Chart.js Line Chart'
                ),
                'tooltips'   => array(
                    'mode'      => 'index',
                    'intersect' => false
                ),
                'hover'      => array(
                    'mode'      => 'nearest',
                    'intersect' => true
                ),
                'scales'     => array(
                    'xAxes' => array(array(
                        'display'    => true,
                        'scaleLabel' => array(
                            'display'     => true,
                            'labelString' => 'Month'
                        )
                    )),
                    'yAxes' => array(array(
                        'display'    => true,
                        'scaleLabel' => array(
                            'display'     => true,
                            'labelString' => 'Value'
                        )
                    ))
                )
            )
        );


        return $config;
    }

}
