{% extends 'layout.volt' %}

{% block title %}All Idea{% endblock %}

{% block styles %}
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

        /* .starrating > input:checked ~ label{ 
            color: #ffca08 ; 
        }

        .starrating > input:hover ~ label{
            color: #ffca08 ; 
        } */
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
                            {% if idea.getRating() >=5 %}
                                <input type="radio" id="star5" name="rating" value="5" /><label class="rate" data-star="5" for="star5" title="5 star" style="color: #ffca08"></label>
                            {% else %}
                                <input type="radio" id="star5" name="rating" value="5" /><label class="rate" data-star="5" for="star5" title="5 star"></label>
                            {% endif %}

                            {% if idea.getRating() >=4 %}
                                <input type="radio" id="star4" name="rating" value="4" /><label class="rate" data-star="4" for="star4" title="4 star" style="color: #ffca08"></label>
                            {% else %}
                                <input type="radio" id="star4" name="rating" value="4" /><label class="rate" data-star="4" for="star4" title="4 star"></label>
                            {% endif %}

                            {% if idea.getRating() >=3 %}
                                <input type="radio" id="star3" name="rating" value="3" /><label class="rate" data-star="3" for="star3" title="3 star" style="color: #ffca08"></label>
                            {% else %}
                                <input type="radio" id="star3" name="rating" value="3" /><label class="rate" data-star="3" for="star3" title="3 star"></label>
                            {% endif %}

                            {% if idea.getRating() >=2 %}
                                <input type="radio" id="star2" name="rating" value="2" /><label class="rate" data-star="2" for="star2" title="2 star" style="color: #ffca08"></label>
                            {% else %}
                                <input type="radio" id="star2" name="rating" value="2" /><label class="rate" data-star="2" for="star2" title="2 star"></label>
                            {% endif %}

                            {% if idea.getRating() >=1 %}
                                <input type="radio" id="star1" name="rating" value="1" /><label class="rate" data-star="1" for="star1" title="1 star" style="color: #ffca08"></label>
                            {% else %}
                                <input type="radio" id="star1" name="rating" value="1" /><label class="rate" data-star="1" for="star1" title="1 star"></label>
                            {% endif %}
                        </div>
                    </td>
                </tr>
            {%endfor%}
        </tbody>
    </table>
{% endblock %}

{% block scripts %}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('.rate').click(function() {
                rate = $(this).data('star');
                idea_id = $(this).closest("tr").data('idea')
                let data = {
                    'rating' : rate,
                    'idea_id' : idea_id,
                };

                $.ajax({
                    url: "{{ url('dashboard/idea/rate') }}",
                    type: 'POST',
                    data: data,
                    success: function(res){
                        if ('error' in res){
                            alert(res.error)
                            return
                        }
                        swal ( "Success" ,  res.data ,  "success" );
                    }
                });
            })
        });
    </script>
{% endblock %}