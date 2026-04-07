@includeif('common.header', ['page' => 'Login'])
<div style="display: flex;flex-direction: column; justify-content: center;align-items: center;">

    <div class="form-container">
        <h2>Sign In</h2>

        <form action="loginuser" method="post">
            @csrf
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit">Sign In</button>
        </form>

    </div>
</div>

<style>
    .form-container {
        background: #fff;
        padding: 24px;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        outline: none;
    }

    .input-group input:focus {
        border-color: #3b82f6;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #3b82f6;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background: #2563eb;
    }

    .footer {
        text-align: center;
        margin-top: 12px;
        font-size: 14px;
    }
</style>