

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real-Time Chat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Real-Time Chat</div>
                    <div class="card-body">
                        <div id="chat-messages" class="overflow-auto" style="height: 300px;"></div>
                        <form @submit.prevent="sendMessage">
                            <div class="input-group mt-3">
                                <input type="text" v-model="message" class="form-control" placeholder="Type your message...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            message: '',
        },
        methods: {
            sendMessage() {
                axios.post('/send-message', { message: this.message })
                    .then(response => {
                        console.log(response.data);
                        this.message = '';
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        },
    });
</script>
</body>
</html>
