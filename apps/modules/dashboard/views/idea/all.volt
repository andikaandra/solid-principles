{% extends 'layout.volt' %}

{% block title %}All Idea{% endblock %}

{% block styles %}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
        .starrating > input {display: none;}

        .starrating > label:before { 
            content: "\f005";
            margin: 2px;
            font-size: 1em;
            font-family: FontAwesome;
            display: inline-block; 
        }

        .starrating > label{
            color: #222222;
        }

        .starrating > input:checked ~ label{ 
            color: #ffca08 ; 
        }

        .starrating > input:hover ~ label{
            color: #ffca08 ; 
        }
    </style>
{% endblock %}

{% block content %}
    <p><?php $this->flashSession->output() ?></p>
    <h3 class="text-center">All Ideas</h3>
    <br>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Rating</th>
                <th scope="col">Author</th>
                <th scope="col">Rate</th>
            </tr>
        </thead>
        <tbody>
            {%for idea in ideaViewModel.getIdeas()%}
                <tr data-idea="{{ idea.getId() }}">
                    <td>{{ idea.getTitle() }}<br><small>{{ idea.getDescription() }}</small></td>
                    <td>{{ idea.getRating() }} / 5</td>
                    <td>{{ idea.getAuthorName() }}</td>
                    <td>
                        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                        </div>
                    </td>
                </tr>
            {%endfor%}
        </tbody>
    </table>
{% endblock %}

{% block scripts %}
    <script type="application/javascript">
        $(document).ready(function() {
            $('input[name ="rating"]').click(function() {
                rate = $(this).val();
                idea_id = $(this).closest("tr").data('idea')
                let data = {
                    'rating' : rate,
                    'idea_id' : idea_id,
                }
                $.ajax({
                    url: "{{ url('dashboard/idea/rate') }}",
                    type: 'POST',
                    data: data,
                    success: function(res){
                        if ('error' in res){
                            alert(res.error)
                            return
                        }
                        alert(res.data)
                    }
                });
            })
        });
    </script>
{% endblock %}