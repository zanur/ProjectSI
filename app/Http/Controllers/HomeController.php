<?php

namespace App\Http\Controllers;

use App\pasien;
use App\pengeluaran;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = pasien::where('tanggal_kunjungan',  date('Y-m-d'))->get();
        $pengeluaran = pengeluaran::where('tgl_pengeluaran',  date('Y-m-d'))->get();


        ///////// area chart
        $lava = new Lavacharts;
        $population = $lava->DataTable();
        $jumlahpasien = pasien::select('tanggal_kunjungan', \DB::raw("count(id_pasien)as count"))
                ->orderBy('tanggal_kunjungan', 'DESC')
                ->groupBy('tanggal_kunjungan')
                ->take(7)
                ->get();

        $population->addDateColumn('tanggal')
                   ->addNumberColumn('jumlah');
        foreach ($jumlahpasien as $x) {
            $population->addRow([$x->tanggal_kunjungan, $x->count]);
        }
        $lava->AreaChart('Population', $population, [
            'legend' => [
                'position' => 'in'
            ],
            'pointSize' => 6,
        ]);

        $pendapatan = pasien::select(\DB::raw("YEAR(tanggal_kunjungan) as year"), \DB::raw("MONTH(tanggal_kunjungan) as month"), \DB::raw("sum(biaya) as sum"))
                ->orderBy('year', 'DESC')
                ->orderBy('month', 'DESC')
                ->groupBy('year', 'month')
                ->take(4)
                ->get();

        $pengeluaran = pengeluaran::select(\DB::raw("YEAR(tgl_pengeluaran) as year"), \DB::raw("MONTH(tgl_pengeluaran) as month"), \DB::raw("sum(total_pengeluaran)as sum"))
                ->orderBy('year', 'DESC')
                ->orderBy('month', 'DESC')
                ->groupBy('year', 'month')
                ->take(4)
                ->get();

        ///////// rendered chart
        $finances = $lava->DataTable();

        $finances->addDateColumn('Month')
                 ->addNumberColumn('pendapatan')
                 ->addNumberColumn('pengeluaran')
                 ->setDateTimeFormat('F');


        $month = date('Y-m-d');
        $j=0;
        $k=0;
        for ($i=0; $i <4 ; $i++) {
            if($j>=count($pendapatan) || $k>=count($pengeluaran)) break;

            if(date('m', strtotime($month)) == (string)$pendapatan[$j]->month){
                if(date('m', strtotime($month)) == (string)$pengeluaran[$k]->month){
                    $finances->addRow([date('F', strtotime($month)), $pendapatan[$j]->sum, $pengeluaran[$k]->sum]);
                    $j++;
                    $k++;
                }
                else{
                    $finances->addRow([date('F', strtotime($month)), $pendapatan[$j]->sum, 0]);
                    $j++;
                }
            }
            else{
                if(date('m', strtotime($month)) == (string)$pengeluaran[$j]->month){
                    $finances->addRow([date('F', strtotime($month)), 0, $pengeluaran[$k]->sum]);
                    $k++;
                }
                else{
                    $finances->addRow([date('F', strtotime($month)), 0, 0]);
                }
            }
            $month = date ("Y-m-d", strtotime("-1 month", strtotime($month)));
        }


        $lava->ColumnChart('Finances', $finances, [
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);


        return view('home', ['pasien'=> $pasien, 'pengeluaran' => $pengeluaran, 'lava'=>$lava]);
    }
}
