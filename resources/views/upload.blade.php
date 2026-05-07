<div>
  <h1>upload file</h1>
  <form action="upload" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file" accept="image/*" required>
    <input type="submit" value="Upload">
  </form>
  @if ($errors->any())
    <ul style="color: red;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
  <div>
    <h1>Images Container</h1>
    @foreach($images as $image)
    <img width="200" src="{{ asset('/storage/' . $image) }}" alt="">
    @endforeach
  </div>
</div>  
