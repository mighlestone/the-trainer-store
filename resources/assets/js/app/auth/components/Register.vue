<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" @submit.prevent="submit">
                        <!--{{ csrf_field() }}-->

                        <div class="form-group" v-bind:class="{ 'has-error': errors.has('first_name') }">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" v-model="first_name" @keydown="errors.clear('first_name')" autofocus>

                                <span class="help-block" v-if="errors.has('first_name')">
                                    {{ errors.get('first_name') }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error': errors.has('last_name') }">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" v-model="last_name" @keydown="errors.clear('last_name')">
                                <span class="help-block" v-if="errors.has('last_name')">
                                    {{ errors.get('last_name') }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error': errors.has('email') }">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="email" @keydown="errors.clear('email')">
                                <span class="help-block" v-if="errors.has('email')">
                                    {{ errors.get('email') }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error': errors.has('password') }">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" v-model="password" @keydown="errors.clear('password')">
                                <span class="help-block" v-if="errors.has('password')">
                                    {{ errors.get('password') }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="password_confirmation" @keydown="errors.clear('password')">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" :disabled="errors.any()">
                                    Register
                                </button>
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

    export default {
        data() {
            return {
                first_name: null,
                last_name: null,
                email: null,
                password: null,
                password_confirmation: null,
                errors: new Errors()
            };
        },
        methods: {
            ...mapActions({
                register: 'auth/register'
            }),
            submit() {
                this.register({
                    payload: {
                        first_name: this.first_name,
                        last_name: this.last_name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    },
                    context: this
                })
            }
        }
    }
</script>