@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Dashboard</h1>
    <div class="row">
        <!-- Products -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-block">View All Products</a>
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-block">Add New Product</a>
                </div>
            </div>
        </div>

        <!-- Courses -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <a href="{{ route('courses.index') }}" class="btn btn-primary btn-block">View All Courses</a>
                    <a href="{{ route('courses.create') }}" class="btn btn-success btn-block">Add New Course</a>
                </div>
            </div>
        </div>

        <!-- Trainings -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">Trainings</div>
                <div class="card-body">
                    <a href="{{ route('trainings.index') }}" class="btn btn-primary btn-block">View All Trainings</a>
                    <a href="{{ route('trainings.create') }}" class="btn btn-success btn-block">Add New Training</a>
                </div>
            </div>
        </div>

        <!-- Competitions -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">Competitions</div>
                <div class="card-body">
                    <a href="{{ route('competitions.index') }}" class="btn btn-primary btn-block">View All Competitions</a>
                    <a href="{{ route('competitions.create') }}" class="btn btn-success btn-block">Add New Competition</a>
                </div>
            </div>
        </div>

        <!-- General Requests -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">General Requests</div>
                <div class="card-body">
                    <a href="{{ route('admin.general_requests.index') }}" class="btn btn-primary btn-block">View All General Requests</a>
                </div>
            </div>
        </div>

        <!-- Bookings -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">Bookings</div>
                <div class="card-body">
                    <a href="{{ route('bookings.index') }}" class="btn btn-primary btn-block">View All Bookings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection