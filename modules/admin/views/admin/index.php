<?php
/**
 * @var \yii\web\View $this
 */
$chartData = \app\components\VisitorComponent::getChartData();
?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Количество посещений за последние две недели</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= \dosamigos\chartjs\ChartJs::widget([
            'type' => 'bar',
            'options' => [
                'height' => 100,
            ],
            'data' => [
                'labels' => $chartData['days'],
                'datasets' => [
                    [
                        'label' => "Уникальные пользователи",
                        'backgroundColor' => "rgba(18,158,224,1)",
                        'borderColor' => "rgba(255,99,132,1)",
                        'pointBackgroundColor' => "rgba(255,99,132,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(255,99,132,1)",
                        'data' => $chartData['visits'],
                    ]
                ]
            ]
        ]);
        ?>
    </div>
    <!-- /.box-body -->
</div>
