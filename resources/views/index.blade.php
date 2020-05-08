<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css"/>
  <title>Document</title>
</head>
<body>
  <div class="ui borderless stackable menu" id="menu">
    <a class="active item"></a>
    <a class="item">Messages</a>
    <a class="item">Friends</a>
    <div class="right menu">
      <div class="item">
        <div class="ui icon input">
          <input type="text" placeholder="Search..." />
          <i aria-hidden="true" class="search icon"></i>
        </div>
      </div>
      <a class="item">Logout</a>
    </div>
  </div>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="/cities" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"><br>
    <textarea name="description" cols="30" rows="4" placeholder="Description"></textarea><br>
    <button type="submit">OK</button>
  </form>

  <form action="/remove_city" method="POST" id="remove_city">
    @csrf
    @method('delete')
  </form>

  <div style="margin-top: 30px;">
    @foreach($cities as $city)
      <div style="margin-bottom: 10px; display: flex; ">
        <form action="/edit_city" method="POST" style="display: inherit;">
          @csrf
          @method('patch')
          <input type="text" name="name" value="{{ $city->name }}" placeholder="Name">
          <textarea name="description" cols="30" rows="1" placeholder="Description" style="resize: none;">{{ $city->description }}</textarea>
          <button type="submit" name="id" value="{{ $city->id }}">OK</button>
        </form>
        <button type="submit" form="remove_city" name="id" value="{{ $city->id }}">X</button>
      </div>
    @endforeach
  </div>    
  </body>
</html>