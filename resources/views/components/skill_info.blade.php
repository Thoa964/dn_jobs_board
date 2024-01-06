@props(['bangCap', 'kyNang'])

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="mb-3">Bằng cấp</h2>
            <button class="btn btn-primary mb-3" id="add-experience">Add Experience</button>
            <ul class="list-group">
                @foreach ($bangCap as $item)
                    <li class="list-group-item">
                        <h4>{{ $item['ten_bang_cap'] }}</h4>
                        <button class="btn btn-secondary btn-sm" data-experience-id="{{ $item['ma_bang_cap'] }}">Edit</button>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">Kỹ năng</h2>
            <button class="btn btn-primary mb-3" id="add-skill">Add Experience</button>
            <ul class="list-group">
                @foreach ($kynang as $item)
                    <li class="list-group-item">
                        <h4>{{ $item['ten_ky_nang'] }}</h4>
                        <button class="btn btn-secondary btn-sm" data-experience-id="{{ $item['ma_ky_nang'] }}">Edit</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
