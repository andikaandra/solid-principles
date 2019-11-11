{% extends 'layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}
    <style>

    </style>
{% endblock %}

{% block content %}
    <p><?php $this->flashSession->output() ?></p>
    <div class="list-group">
        {% if authViewModel.getIsAuthenticated() %}
        <form action="{{url('dashboard/author/logout')}}" method="POST">
            <button class="list-group-item list-group-item-action" type="submit">Logout</button>
        </form>
        {% else %}
            <a href="{{url('dashboard/author/new')}}" class="list-group-item list-group-item-action">Register</a>
            <a href="{{url('dashboard/author/login')}}" class="list-group-item list-group-item-action">Login</a>
        {% endif %}
        <a href="{{url('dashboard/idea/new')}}" class="list-group-item list-group-item-action">New Idea</a>
        <a href="{{url('dashboard/idea/all')}}" class="list-group-item list-group-item-action">All Idea</a>
    </div>
{% endblock %}

{% block scripts %}
    <script type="application/javascript">
        $(document).ready(function() {

        });
    </script>
{% endblock %}