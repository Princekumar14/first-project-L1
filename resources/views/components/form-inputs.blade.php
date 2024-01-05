<div class="mb-3">
    <label for="" class="form-label">{{$label}}</label>
    <input type="{{$type}}" value="{{ old($name) }}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}">
    <span class="text-danger">@error($name) {{ $message }} @enderror</span>
</div>
{{-- {{$demo}} --}}
