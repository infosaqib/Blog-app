@includeif('common.header', ['page' => 'Register'])

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #800000;
        margin: 0;
        padding: 0;
    }

    #bg {
        max-width: 800px;
        margin: 20px auto;
        padding: 30px;
        background-color: #800000;
        border: 2px solid whitesmoke;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    h1 {
        color: lightsalmon;
        text-align: center;
        font-size: 32px;
        margin-bottom: 20px;
    }

    #form {
        background-color: lightsalmon;
        border: 2px solid black;
        padding: 30px;
        border-radius: 10px;
    }

    .form-row {
        display: flex;
        align-items: flex-start;
        margin-bottom: 4px;
    }

    .form-label {
        font-weight: bold;
        width: 30%;
        padding: 8px;
        color: #000;
    }

    .form-field {
        flex: 1;
        padding: 8px;
        color: #000;
        vertical-align: top;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 6px 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin-top: 4px;
        margin-bottom: 10px;
        box-sizing: border-box;
        font-size: 14px;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border: 2px solid #b1e1e4;
        background-color: #fff;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
        margin-right: 10px;
    }

    button[type="submit"] {
        background-color: lawngreen;
        color: #000;
    }

    button[type="reset"] {
        background-color: purple;
        color: #fff;
    }

    .inline-group label {
        margin-right: 15px;
        font-weight: normal;
    }

    .qualification-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .qualification-table th,
    .qualification-table td {
        border: 1px solid #000;
        padding: 5px;
        text-align: center;
    }

    .hobbies input[type="text"] {
        width: calc(100% - 120px);
        display: inline-block;
        margin-left: 5px;
    }
    span{
        color: red;
        font-size: 1em;
    }
</style>

<div id="bg">
    <h1>STUDENT REGISTRATION FORM</h1>
    <div id="form">
        @if($errors->any())
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
        @endif
        <form method="post" action="adduser">
            <div class="form-row">
                <div class="form-label">NAME:</div>
                <div class="form-field">
                    <input type="text" name="name" maxlength="30" placeholder="Enter name" />
                </div>
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-label">EMAIL ID:</div>
                <div class="form-field">
                    <input type="text" name="email" placeholder="Enter email" />
                </div>
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-label">GENDER:</div>
                <div class="form-field inline-group">
                    <input id="female" type="radio" name="gender" value="f"><label for="female">Female</label>
                    <input id="male" type="radio" name="gender" value="m"><label for="male">Male</label>
                    @error('gender')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">COUNTRY:</div>
                <div class="form-field">
                    <select name="country">
                        <option value="#">select your country</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UAE">UAE</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Japan">Japan</option>
                        <option value="UK">UK</option>
                        <option value="China">China</option>
                    </select>
                </div>
                @error('country')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-label">HOBBIES:</div>
                <div class="form-field hobbies">
                    <input type="checkbox" name="hobbies[]" value="Singing" id="singing">
                    <label for="singing">Singing</label>
                    <input type="checkbox" name="hobbies[]" value="Dancing" id="dancing">
                    <label for="dancing">Dancing</label>
                    <input type="checkbox" name="hobbies[]" value="Drawing" id="drawing">
                    <label for="drawing">Drawing</label>
                    <input type="checkbox" name="hobbies[]" value="Sketching" id="sketching">
                    <label for="sketching">Sketching</label>
                </div>
                @error('hobbies')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div style="text-align:center; margin-top:10px;">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>