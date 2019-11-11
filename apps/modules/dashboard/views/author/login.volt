{% extends 'layout.volt' %}

{% block title %}Author{% endblock %}

{% block styles %}
    <style>

    </style>
{% endblock %}

{% block content %}
    <h3 class="text-center">Login</h3>
    <br>
    <p><?php $this->flashSession->output() ?></p>
    <form action="{{url('dashboard/author/login')}}" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control form-control-sm" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password" min="6" required>
        </div>
        <a href="{{url('')}}" role="button" class="btn btn-secondary btn-sm">Back</a>&emsp;<button type="submit" class="btn btn-primary btn-sm">Login</button>
    </form>
{% endblock %}

{% block scripts %}
    <script type="application/javascript">
        $(document).ready(function() {

        });
    </script>
{% endblock %}