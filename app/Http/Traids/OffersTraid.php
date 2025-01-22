<?php

namespace App\Http\Traids;




class OffersTraid
{

    public function saveImages ( $photo, $folder){


        $file = $photo; // Récupère le fichier
        $file_extension = $file->getClientOriginalExtension(); // Extension du fichier
        $file_name = time() . '.' . $file_extension; // Génère un nom unique
        $destination_path = public_path($folder); // Chemin de destination
        $file->move($destination_path, $file_name);

        return $file_name;

    }

}
