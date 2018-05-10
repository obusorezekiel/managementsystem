<div>
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="fa fa-comment"></span>
                <h3 class="panel-title">
                    Recent Comments</h3>
            </div>
                     
            <div class="panel-body">
                <ul class="list-group">
                        @foreach($comments as $comment)  
                    
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">{{$comment->body}}</a>
                                    <div class="mic-info">
                                    By: <i class="fa fa-user-o" aria-hidden="true"></i> <a href="#">{{Auth::user()->name}}</a> on {{$comment->created_at}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <b>Proof:</b> <a href="#">{{$comment->url}}</a>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="fa fa-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="fa fa-check"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>           
               </div>
        </div>
      </div>
      @endforeach