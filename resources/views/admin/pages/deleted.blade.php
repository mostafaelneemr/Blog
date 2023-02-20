<!-- Deleted categories -->
<div class="modal fade" id="Deleted{{$page->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Delete page {{$page->title}}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('pages.destroy',$page->id)}}" method="post">
                   @method('DELETE')
                   @csrf

                   <div class="row">
                       <div class="col">
                           <label class="text-danger h6">Delete</label>
                           <input type="text" value="{{$page->title}}" readonly class="form-control">
                       </div>
                   </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">cancle</button>
                       <button class="btn btn-primary">comfirm</button>
                   </div>

               </form>
           </div>
       </div>
   </div>
</div>