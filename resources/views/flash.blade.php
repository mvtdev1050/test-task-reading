@if( Session::has( 'success' ))
	<div class="alert alert-success">		
     	{!! Session::get( 'success' ) !!}
     	<i class="fas fa-window-close pull-right msg-close" aria-hidden="true" style="float: right"></i>
    </div>
@elseif( Session::has( 'error' ))
	<div class="alert alert-danger">		
     	{!! Session::get( 'error' ) !!} 
     	<i class="fas fa-window-close pull-right msg-close" aria-hidden="true" style="float: right"></i>
    </div>
@endif