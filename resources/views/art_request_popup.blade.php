<div class="request-container" id="requestContainer">
        <div class="request-content">
            <span class="close-btn" id="closeRequestBtn">&times;</span>
            <h2>Request An Art</h2>
            @if (session('errors'))
            <div class="mb-4 font-medium text-sm text-green-600 alert alert-danger">
                {{ session('errors') }}
            </div>
            @endif
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="art_request">
                @csrf
                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required></textarea>
                </div>
                <button id="submit" type="submit">Submit Your Request</button>
            </form>
        </div>
    </div>

