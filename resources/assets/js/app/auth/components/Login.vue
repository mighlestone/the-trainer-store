<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" @submit.prevent="submit">
                        <div class="alert alert-danger col-md-6 col-md-offset-4" v-if="errors.has('root')">
                            {{ errors.get('root') }}
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error': errors.has('email') }">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" autofocus v-model="email" @keydown="errors.clear('email') || errors.clear('root')">
                                <span class="help-block" v-if="errors.has('email')">
                                    {{ errors.get('email') }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error': errors.has('password') }">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" v-model="password" @keydown="errors.clear('password') || errors.clear('root')">
                                <span class="help-block" v-if="errors.has('password')">
                                    {{ errors.get('password') }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="#">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';
    import Errors from '../../../classes/Errors';
    import localforage from 'localforage';
    import { isEmpty } from 'lodash';

    export default {
        data() {
            return {
                email: null,
                password: null,
                errors: new Errors()
            };
        },
        methods: {
            ...mapActions({
                login: 'auth/login'
            }),
            submit() {
                this.login({
                    payload: {
                        email: this.email,
                        password: this.password,
                    },
                    context: this
                }).then(() => {
                    localforage.getItem('intended').then((name) => {
                        if (isEmpty(name)) {
                            this.$router.replace({ name: 'home' });
                            return
                        }
                        this.$router.replace({ name: name })
                    })
                })
            }
        }
    }
</script>