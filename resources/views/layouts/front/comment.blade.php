@if($comment->isChild())
<div class="comment">
   <img class="comment-avatar" alt="" src="{{ Gravatar::fallback(asset('front/images/icon-image/avatar1.jpg'))->get($comment->email) }}">
   <div class="comment-body">
      <div class="meta-data">
         <span class="float-left">
            <a class="comment-reply" data-id="{{ $comment->id }}" href="javascript:void(0)">
               <span class="fa fa-reply">پاسخ دادن</span>
            </a>
         </span>
         <span class="comment-author">{{ $comment->name }}</span>
         <span class="comment-date">{{ verta($comment->created_at)->format('d F Y') }}</span>
      </div>
      <div class="comment-content">
         <p>{!! nl2br(htmlentities($comment->comment)) !!}</p>
      </div>
   </div>
</div>
@endif
@if(!$comment->isChild())
<ul class="comments-reply">
   <li>
      <div class="comment">
         <img class="comment-avatar float-right" alt="" src="{{ Gravatar::fallback(asset('front/images/icon-image/avatar4.jpg'))->get($comment->email) }}">
         <div class="comment-body">
            <div class="meta-data">
               <span class="float-left">
                  <a class="comment-reply" data-id="{{ $comment->id }}" href="javascript:void(0)">
                     <span class="fa fa-reply">پاسخ دادن</span>
                  </a>
               </span>
               <span class="comment-author">{{ $comment->name }}</span>
               <span class="comment-date">{{ verta($comment->created_at)->format('d F Y') }}</span>
            </div>
            <div class="comment-content">
               <p>{!! nl2br(htmlentities($comment->comment)) !!}</p>
            </div>
         </div>
      </div>
      <!-- Comments end -->
      @each('layouts.front.comment',$comment->children,'comment')
   </li>
</ul>
@endif
@each('layouts.front.comment',$comment->children,'comment')