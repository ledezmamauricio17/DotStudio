<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index(){


    $user = User::select('name','type')
                        ->where('id', '=', auth()->id())
                        ->get();


    // //Proyectos seleccionados
    //     $proyectos_bd = Elemento::select('elemento1','elemento2','elemento3')
    //                         ->where('id', '=', 2)
    //                         ->get();

    //     foreach($proyectos_bd as $proyecto)
    //     $proyecto1 = get_proyecto($proyecto->elemento1);
    //     $proyecto2 = get_proyecto($proyecto->elemento2);
    //     $proyecto3 = get_proyecto($proyecto->elemento3);

    //     $proyectos = array(
    //         'elemento1' => $proyecto1,
    //         'elemento2' => $proyecto2,
    //         'elemento3' => $proyecto3,
    //     );
    // //frase seleccionada
    //     $frases = Elemento::select('elemento1')
    //                         ->where('id', '=', 3)
    //                         ->get();

    //     foreach($frases as $fra)
    //     $frase1 = get_frase($fra->elemento1);

    //     $frase = array(
    //         'elemento1' => $frase1,
    //     );
    // //eventos seleccionados
    //     $eventosbd = Elemento::select('elemento1','elemento2','elemento3')
    //                         ->where('id', '=', 4)
    //                         ->get();

    //     foreach($eventosbd as $evento)
    //     $evento1 = get_evento($evento->elemento1);
    //     $evento2 = get_evento($evento->elemento2);
    //     $evento3 = get_evento($evento->elemento3);

    //     $eventos = array(
    //         'elemento1' => $evento1,
    //         'elemento2' => $evento2,
    //         'elemento3' => $evento3,
    //     );

    // //video
    //     $video = Video::where('id', '=', 1)->get();

    // //pregunta home y contactenos home

    // $pregunta_home = Conjunto::where('conjuntos.id', '=', 13)
    //                     ->select('images.url as img', 'textos.cuerpo as desc')
    //                     ->join('images','conjuntos.id_imagen','=','images.id')
    //                     ->join('textos','conjuntos.id_texto','=','textos.id')
    //                     ->get();

    // $contactenos_home = Conjunto::where('conjuntos.id', '=', 14)
    //                     ->select('images.url as img', 'textos.cuerpo as desc')
    //                     ->join('images','conjuntos.id_imagen','=','images.id')
    //                     ->join('textos','conjuntos.id_texto','=','textos.id')
    //                     ->get();


    //     //redes
    //     //whatsapp
    //         $whatsapp = Texto::where('titulo', '=', 'whatsapp')->get();
    //     //facebook
    //         $facebook = Texto::where('titulo', '=', 'facebook')->get();
    //     //instagram
    //         $instagram = Texto::where('titulo', '=', 'instagram')->get();
    //     //youtube
    //         $youtube = Texto::where('titulo', '=', 'youtube')->get();
    //     //linkedin
    //         $linkedin = Texto::where('titulo', '=', 'linkedin')->get();

    //     //papeles
    //         $etica = Image::where('id', '=', 49)->get();
    //         $sarlaft = Image::where('id', '=', 50)->get();

    // return view ('PaginaPrincipal.home', compact('proyectos','frase','eventos','banners','video','pregunta_home','contactenos_home','whatsapp','facebook','instagram','youtube','linkedin','etica','sarlaft'));
    return view ('PaginaPrincipal.home',compact('user'));
    }




}
