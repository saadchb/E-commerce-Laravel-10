@extends('layouts.user.app')
@section('title','Dachboard')
@section('content')
<?php

use App\Models\Famille;
use App\Models\Produit;
use App\Models\User;

$Produits = Produit::count();
$Users = User::count();
$Familles = Famille::count();
?>

<section class="section">
     <center class="mt-12"><h1>User dachboard</h1></center>  
</section>
@endsection