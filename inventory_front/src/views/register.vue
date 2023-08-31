<template>

    <div>    
        <form class="container mt-3">
            <h4>Register Form</h4>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Full name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3 form-check">
                <router-link :to="{name: 'login'}">Already registered?</router-link>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>




</template>

<script>
export default {
    name: 'register'
}




</script>