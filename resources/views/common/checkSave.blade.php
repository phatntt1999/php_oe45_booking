@if (session('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{{ session('msg')}}</li>
        </ul>
    </div>
@endif
