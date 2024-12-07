@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-img-top {
            object-fit: cover;
            height: 200px; /* Adjust as needed */
        }
    </style>

    <h1>Welcome, <u><b>{{ Auth::user()->name }}!</b></u></h1>
    <p>Welcome, Customer!</p>
    <div class="row">
        <!-- Courses -->
        <div class="col-md-4">
            <a href="{{ route('shop.courses') }}" class="text-decoration-none">
                <div class="card mb-4 shadow-sm">
                    <img src="https://d3f1iyfxxz8i1e.cloudfront.net/courses/course_image/278e40f4c288.jpeg" class="card-img-top" alt="Courses">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">Explore a variety of courses to enhance your skills and knowledge.</p>
                        <button class="btn btn-primary btn-block">View Courses</button>
                    </div>
                </div>
            </a>
        </div>

        <!-- Products -->
        <div class="col-md-4">
            <a href="{{ route('shop.products') }}" class="text-decoration-none">
                <div class="card mb-4 shadow-sm">
                    <img src="https://framerusercontent.com/images/N4T0K2fZKjYfdcRYvcpk9QrJ5Eg.jpg" class="card-img-top" alt="Products">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Discover our range of high-quality products for all your needs.</p>
                        <button class="btn btn-primary btn-block">View Products</button>
                    </div>
                </div>
            </a>
        </div>

        <!-- Trainings -->
        <div class="col-md-4">
            <a href="{{ route('shop.trainings') }}" class="text-decoration-none">
                <div class="card mb-4 shadow-sm">
                    <img src="https://img-b.udemycdn.com/course/750x422/5885980_764a.jpg" class="card-img-top" alt="Trainings">
                    <div class="card-body">
                        <h5 class="card-title">Trainings</h5>
                        <p class="card-text">Join our training sessions to gain hands-on experience and expertise.</p>
                        <button class="btn btn-primary btn-block">View Trainings</button>
                    </div>
                </div>
            </a>
        </div>

        <!-- Bookings -->
        <div class="col-md-4">
            <a href="{{ route('shop.bookings') }}" class="text-decoration-none">
                <div class="card mb-4 shadow-sm">
                    <img src="https://images.squarespace-cdn.com/content/v1/653fd412fd3eec6c2873869c/dc1752da-f49c-4b31-bc5f-631d50c2e9c2/10%2B%2BTips%2Bto%2BScrapbook%2BLike%2Ba%2BPro%2B__%2BRoot%2B%26%2BBranch%2BPaper%2BCo.jpg" class="card-img-top" alt="Bookings">
                    <div class="card-body">
                        <h5 class="card-title">Bookings</h5>
                        <p class="card-text">Book our exclusive services and enjoy a premium experience.</p>
                        <button class="btn btn-primary btn-block">View Bookings</button>
                    </div>
                </div>
            </a>
        </div>

        <!-- Competitions -->
        <div class="col-md-4">
            <a href="{{ route('shop.competitions') }}" class="text-decoration-none">
                <div class="card mb-4 shadow-sm">
                    <img src="https://amelia-j-wilson.com/wp-content/uploads/2021/05/28D6B2BA-5C4F-4DCE-876A-7CED3527BCB2.jpeg" class="card-img-top" alt="Competitions">
                    <div class="card-body">
                        <h5 class="card-title">Competitions</h5>
                        <p class="card-text">Participate in our exciting competitions and showcase your talent.</p>
                        <button class="btn btn-primary btn-block">View Competitions</button>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
