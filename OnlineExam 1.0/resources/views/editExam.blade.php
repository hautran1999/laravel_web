@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/createexam.css')}}">
<div class="mt-4 mb-4">
	<div class="container">

		<form action="{{route('postedit',$info['exam_id'])}}" method="POST">
			@csrf
			<div class="text-center header-text">
				<h1>{{$info['exam_name']}}</h1>
			</div>
			<div id="question">

			</div>
			<input type="button" onclick="addQuestion()" class="btn btn-sm bg-primary text-white" value="Add Question">

			<div class="hero-content text-center">
				<button type="submit" onclick="document.getElementById('create').style.display='block'"
					class="btn clever-btn">Finish</button>
			</div>
		</form>

	</div>
</div>
<script>
	var number_question_answer = new Array();
	for (var i = 1; i < 100; i++) {
		number_question_answer[i] = new Array("K", "J", "I", "H", "G", "F", "E", "D", "C", "B", "A");
	}

	var number_question = 1;
	function deleteQuestion(id) {
		var i = id.charAt(id.length - 1)
		number_question_answer[i]
		$('#question_' + i).remove();
		$('#delete_question_' + (i - 1)).show();
		number_question--;
		number_question_answer[i] = new Array("K", "J", "I", "H", "G", "F", "E", "D", "C", "B", "A");

	}

	function addAnswer(id) {
		for (var i = 1; i < number_question; i++) {
			if (document.getElementById('list_answer_' + i).contains(document.getElementById(id))) {
				$("#answer_body_" + i).append($(`<div class="form-group row showcase_row_area" id="${'answer_' + i + '_' + number_question_answer[i].pop()}">
                                    <div class="col-sm-1 showcase_text_area">
                                        <label>${String.fromCharCode(number_question_answer[i][number_question_answer[i].length - 1].charCodeAt(0) - 1)}</label>
                                    </div>
                                    <div class="col-sm-9 showcase_content_area">
                                        <input required name=${'question[' + i + '][1][' + String.fromCharCode(number_question_answer[i][number_question_answer[i].length - 1].charCodeAt(0) - 1) + ']'} type="text" class="form-control" id=${'ans' + i + String.fromCharCode(number_question_answer[i][number_question_answer[i].length - 1].charCodeAt(0) - 1)} placeholder="">
                                    </div>
                                    <div class="col-sm-1 btn-group btn-group-vertical text-center" data-toggle="buttons">
                                        <label class="btn active">
                                            <input type="checkbox"  name=${'question[' + i + '][2][]'} value=${String.fromCharCode(number_question_answer[i][number_question_answer[i].length - 1].charCodeAt(0) - 1)} id=${'check' + i + String.fromCharCode(number_question_answer[i][number_question_answer[i].length - 1].charCodeAt(0) - 1)}><i class="fa fa-square-o fa-2x"></i><i class="fa fa-check-square-o fa-2x"></i>
                                        </label>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <input type="button" id="${'delete_answer_' + i + '_' + String.fromCharCode(number_question_answer[i][number_question_answer[i].length - 1].charCodeAt(0) - 1)}" onclick="deleteAnswer(this.id)" class="btn btn-sm bg-danger text-white" value="Delete">
                                    </div>
                                </div>`));
				var key = String.fromCharCode(number_question_answer[i][number_question_answer[i].length - 1].charCodeAt(0) - 2);
				if (key != '@') {
					$('#delete_answer_' + i + '_' + key).hide();
				}
				break;
			}
		}
	}
	function deleteAnswer(id) {
		var i = id.charAt(id.length - 3);
		var char = id.charAt(id.length - 1)
		$('#answer_' + i + '_' + char).remove();
		$('#delete_answer_' + i + '_' + String.fromCharCode(char.charCodeAt(0) - 1)).show();
		number_question_answer[i].push(char);

	}
	function addQuestion() {
		$("#question").append($(`<div class="grid" id="${'question_' + number_question}">
                    <div>
                        <div class="grid-header">
                            <div class="row">
                                <div class="col-sm-1 text-center">${'Question ' + number_question}</div>
                                <div class="col-sm-9 showcase_content_area">
                                    <textarea id=${'quest' + number_question} name=${'question[' + number_question + '][0]'} required type="text" class="form-control color-input-white" placeholder=""></textarea>
                                </div>
                                <div class="col-sm-1 text-center mt-10">Answer</div>
                            </div>
                        </div>
                        <div class="grid-body" id="${'list_answer_' + number_question}">
                            <div class="item-wrapper" id="${'answer_body_' + number_question}">
                            </div>
                            <input type="button" id="${'add_' + number_question}" onclick="addAnswer(this.id)"
                                class="btn btn-sm bg-primary text-white ml-50" value="Add answer">
                            <input type="button" id="${'delete_question_' + number_question}" onclick="deleteQuestion(this.id)" class="btn btn-sm bg-danger text-white" value="Delete Question">
                        </div>
                    </form>
                </div>`));
		$('#delete_question_' + (number_question - 1)).hide();
		number_question++;
	}
	function load() {
		var quest = @json($quest);
		for (var i = 0; i < quest.length; i++) {
			var number = i + 1;
			addQuestion();
			document.getElementById("quest" + number).value = quest[i].question;
			for (var j = 0; j < quest[i].answers.length; j++) {
				$('#add_' + number).trigger('click');
				var key;
				if (j == 0) { key = 'A'; }
				if (j == 1) { key = 'B'; }
				if (j == 2) { key = 'C'; }
				if (j == 3) { key = 'D'; }
				if (j == 4) { key = 'E'; }
				if (j == 5) { key = 'F'; }
				document.getElementById("ans" + number + key).value = quest[i].answers[j];
				if (key == quest[i].true) {
					document.getElementById("check" + number + key).checked = true;
				}
			}
		}
	}
	document.addEventListener('DOMContentLoaded', function () {
		load();
	});
</script>
@endsection