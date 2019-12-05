<?php

namespace App\Helpers;

use App\MSISDN;
use Khill\Lavacharts\Lavacharts;

class ChartUtils
{
    public static function bar(){
        $stocksTable = \Lava::DataTable();

        /*$stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Subscribed')
            ->addNumberColumn('UnSubscribed');*/

        $data = MSISDN::select("msisdn as 1","is_subscribed as 0")
            ->get()->toArray();

        $stocksTable->addStringColumn("Mobile Numbers")
            ->addNumberColumn("Subscribed")->addRows($data);

       /* for ($a = 1; $a < 5; $a++) {

            $stocksTable->addRow([
                '2015-10-' . $a, rand(800, 1000), rand(800, 1000)
            ]);
        }*/

        \Lava::ComboChart('StocksTable', $stocksTable, [
            'title' => 'Subscribed & UnSubscribed',
            'titleTextStyle' => [
                'color'    => 'rgb(123, 65, 89)',
                'fontSize' => 12
            ],
            'legend' => [
                'position' => 'in'
            ],
            'seriesType' => 'line',
            /*'series' => [
                2 => ['type' => 'line']
            ],*/
            'height'      => 200,
            'width'      => 400,
        ]);
    }

    public static function gaugeChart(){

        $temps = \Lava::DataTable();

        $temps->addStringColumn('Type')
            ->addNumberColumn('Value')
            ->addRow(['CPU', rand(0,100)])
            ->addRow(['Case', rand(0,100)])
            ->addRow(['Graphics', rand(0,100)]);

        \Lava::GaugeChart('Temps', $temps, [
            'width'      => 400,
            'greenFrom'  => 0,
            'greenTo'    => 69,
            'yellowFrom' => 70,
            'yellowTo'   => 89,
            'redFrom'    => 90,
            'redTo'      => 100,
            'majorTicks' => [
                'Safe',
                'Critical'
            ]
        ]);

    }

    public static function new_g(){
        $finances = \Lava::DataTable();

        $finances->addDateColumn('Year')
            ->addNumberColumn('Sales')
            ->addNumberColumn('Expenses')
            ->addNumberColumn('Net Worth')
            ->addRow(['2009-1-1', 1100, 490, 1324])
            ->addRow(['2010-1-1', 1000, 400, 1524])
            ->addRow(['2011-1-1', 1400, 450, 1351])
            ->addRow(['2012-1-1', 1250, 600, 1243])
            ->addRow(['2013-1-1', 1100, 550, 1462]);

        \Lava::ComboChart('Finances', $finances, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color'    => 'rgb(123, 65, 89)',
                'fontSize' => 12
            ],
            'legend' => [
                'position' => 'in'
            ],
            'seriesType' => 'bars',
            'series' => [
                2 => ['type' => 'line']
            ],
            'height'      => 200,
            'width'      => 400,
        ]);
    }
}
