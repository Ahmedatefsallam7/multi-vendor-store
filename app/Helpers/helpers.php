<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

function attachFile( Model $model, Request $request, string $field ): void {
    if ( $request->hasFile( $field ) ) {
        $fileName = $request->file( $field )->getClientOriginalName();
        $request->file( $field )->move( public_path( "images/{$model->getTable()}" ), $fileName );
        $model->update( [ $field => "images/{$model->getTable()}/{$fileName}" ] );
    }
}
