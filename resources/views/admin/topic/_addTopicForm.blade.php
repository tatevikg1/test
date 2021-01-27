<div class="bg-modal">
    <div class="modal-content">

        <div class="close">+</div>

        <form method="post" id='addTopicForm'>
            @csrf

            <div class="">
                <input type="text" placeholder="Topic name" id="topic" name="topic" value="{{ old('topic') }}"  class="form-control" required>
                <span id="addTopicError" class="error_messages" style="color:red"></span>
            </div>

            <div  class="btn btn-secondary d-inline-flex p-2 mt-3" id="addTopic">Add topic</div>
            
        </form>

    </div>
</div>