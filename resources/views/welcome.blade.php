@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-3 px-4">
    <div class="card shadow bg-primary my-3 py-3 px-2 text-white">
      <p class="text-center small text-uppercase">
        @auth {{Auth::user()->username}} @endauth
      </p>

      <div class="d-flex">
        <div class="profile-img-holder mx-auto">
          <img src="{{asset('images/user-avatar.png')}}" class="img-fluid" alt="">
        </div>
      </div>

      <h4 class="h6 text-uppercase text-center my-3">
        @auth {{Auth::user()->name}}
        @else Guest User
        @endauth
      </h4>
    </div>
    <div class="card py-5 shadow px-2"></div>
  </div>
  <div class="col-md-6">
    <main role="main" class="container">
      @auth
      <div class="align-items-center p-3 my-3 text-white-50 bg-primary rounded shadow-sm">
        <form action="submit-topic" method="POST">
          @csrf
          <div class="form-group">
            <label for="title">Create a new Topic</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="What's on your mind?">
          </div>

          <div class="d-flex">
            <span class="counter">11/120</span>

            <button type="submit" class="btn bg-white ml-auto btn-sm">Submit</button>
          </div>
        </form>
      </div>
      @endauth

      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
        
        @foreach(App\Topic::latest()->get()->take(20) as $topic)
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">{{$topic->user->username}}</strong>
            {{$topic->title}}
          </p>

          <small class="text-right">
            {{$topic->created_at->diffForHumans()}}
          </small>
        </div>
        @endforeach

        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>

      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">Full Name</strong>
              <a href="#">Follow</a>
            </div>
            <span class="d-block">@username</span>
          </div>
        </div>
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">Full Name</strong>
              <a href="#">Follow</a>
            </div>
            <span class="d-block">@username</span>
          </div>
        </div>
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">Full Name</strong>
              <a href="#">Follow</a>
            </div>
            <span class="d-block">@username</span>
          </div>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All suggestions</a>
        </small>
      </div>
    </main>
  </div>
  <div class="col-md-3"></div>
</div>


@endsection
