<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
    
}
.form-container{
        display: flex;
    align-items: center;
    justify-content: center;
}

form {
    background: #fff;
    padding: 40px;
    margin: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    width: 100%;
    max-width: 450px;
}

form div {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
    font-size: 14px;
}

input[type="text"],
input[type="description"] {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid #ddd;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.2s;
    outline: none;
}

input[type="text"]:focus,
input[type="description"]:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
}

input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1.5px dashed #ccc;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    color: #555;
}

input[type="file"]:hover {
    border-color: #4f46e5;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #4f46e5;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #4338ca;
}
    .card-grid {
        display: grid;
        grid-template-columns: repeat(3, 400px);
        gap: 1em;
    }

    .card {
        max-width: 320px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        background: #f9fafb;
    }

    .card img {
        width: 100%;
        height: 180px;
        /* reduced image size */
        object-fit: cover;
        /* keeps it neat */
        border-radius: 8px;
    }

    .card h5 {
        margin: 14px 0 8px;
        font-size: 20px;
        font-weight: 600;
        color: #111;
    }

    .card p {
        margin-bottom: 0;
        color: #555;
        font-size: 14px;
    }
</style>
<div class="container">
<div class="form-container">
    <form action="upload" method="post">
        @csrf
        @method('POST')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <input type="description" name="description" id="description" required>
        </div>
        <div>
            <label for="Image upload">Upload</label>
            <input type="file" name="file" id="file" required>
        </div>
        <input type="submit" value="Submit">
    </form>
    </div>
    <div class="card-grid">
        @foreach($posts as $post) <div class="card">
                    <img src=" {{ $post['image'] }}" alt="">

            <h5>{{$post->title}}</h5>

            <p>
                {{$post->description}}
            </p>
                </div>
        @endforeach
</div>
</div>