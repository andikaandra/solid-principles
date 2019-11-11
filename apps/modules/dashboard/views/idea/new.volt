{% extends 'layout.volt' %}

{% block title %}Idea{% endblock %}

{% block styles %}
    <style>

    </style>
{% endblock %}

{% block content %}
    <p><?php $this->flashSession->output() ?></p>
    <form action="{{url('dashboard/idea/new')}}" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control form-control-sm" id="title" name="title" aria-describedby="titlHelp" placeholder="Enter title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <a href="{{url('')}}" role="button" class="btn btn-secondary btn-sm">Back</a>&emsp;<button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
{% endblock %}

{% block scripts %}
    <script type="application/javascript">
        $(document).ready(function() {

        });
    </script>
{% endblock %}