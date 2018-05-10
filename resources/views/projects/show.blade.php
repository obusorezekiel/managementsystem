@extends('layouts.app')
@section('content')

    <div class="col-md-9 col-lg-9 col-sm-9">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->


      <!-- Jumbotron -->
      <div class="well well-lg">
      <h1>{{$project->name}}</h1>
      <p class="lead">{{$project->description}}</p>
      </div>

      <!-- Example row of columns -->
      <div class="row" style="background: white; margin: 10px;">
        
        <br/>

        <div class="row container-fluid"></div>
        <form method="post" action="{{ route('comments.store')}}">
          {{ csrf_field() }}
          
          <input type="hidden" name="commentable_type" value="App\Project">
          <input type="hidden" name="commentable_id" value="{{$project->id}}">
          
          <div class="form-group">
            <label for="comment-content">Comment</label>
          <textarea placeholder="Enter Comment" style="resize: vertical" id="comment-content" name="body" rows="3" spellcheck="false" class="form-control autosize-target target text-left"></textarea>
          </div>


          <div class="form-group">
            <label for="comment-content">Proof of Work done(Url/Photos)</label>
          <textarea placeholder="Enter Url or screenshots" style="resize: vertical" id="comment-content" name="url" rows="2" spellcheck="false" class="form-control autosize-target target text-left"></textarea>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit"/>
          </div>
        </form>
      </div>

      
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Recent Comments</h3>
            </div>
            @foreach($project->comments as $comment)            
            <div class="panel-body">
                <ul class="list-group">
                    
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">{{$comment->body}}</a>
                                    <div class="mic-info">
                                    By: <a href="#">{{Auth::user()->name}}</a> on {{$comment->created_at}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <b>Proof:</b> <a href="#">{{$comment->url}}</a>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>           
               </div>
        </div>
   
    @endforeach




       {{--@foreach($project->projects as $project)
        <div class="col-lg-4">
          <h2>{{ $project->name}}</h2>
        <p>{{ $project->description }}</p>
        <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project</a></p>
        </div>
        @endforeach --}}
      </div>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <!--<div class="sidebar-module sidebar-module-inset">
          <h4>About</h4>
          <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>-->
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
            <li><a href="/projects/{{ $project->id}}/edit">Edit</a></li>
            <li><a href="/projects/create">Create New project</a></li>
            <li><a href="/projects">My projects</a></li>
            
            <br/><br/>

            @if($project->user_id == Auth::user()->id)

              <li>
                <a href="#" onclick="
                var result = confirm('Are you sure you wish to delete this project?');
                if(result){
                  event.preventDefault();
                  document.getElementById('delete-form').submit();
                }
                ">
                Delete

              <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" method="POST" style="display:none">
                <input type="hidden" name="_method" value="delete">
                {{ csrf_field() }}
              </form>

              </li>
              @endif
              <!--<li><a href="#">Add a new User</a></li>-->
            </ol>
          </div>
      </div>
    
@endsection

