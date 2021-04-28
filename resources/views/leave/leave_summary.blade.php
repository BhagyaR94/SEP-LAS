@extends('layouts.master')
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr>
                <td scope="col">Casual Leaves applied out of 21</td>
                <td scope="col">Medical Leaves applied out of 21</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$casual_count}}</td>
                <td>{{$medical_count}}</td>
            </tr>
        </tbody>
    </table>
</div>