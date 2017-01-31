@extends('frontend.layout')

@section('pageTitle')
	<title>About | Alvin Manansala - Fullstack Developer</title>
@stop

@section('content')
	<div id="aboutWrapper" class="pageWrapper">
		<div class="row">
			<div class="large-11 medium-11 large-centered medium-centered columns">
				<div id="aboutMainContent">
                    <div class="row">
                        <div class="large-5 medium-7 columns">
                            <img src="/uploads/alvin.jpg" alt="Alvin Manansala">
                        </div>

                        <div class="large-7 medium-5 columns">
                            <h1>
                                Yo! I'm Alvin Manansala - a <span class="highlightText">Fullstack Developer</span> & <span class="highlightText">Web Designer</span> from Philippines.
                            </h1>

                            <p>
                                I have been in this field for over 4 years, and have been loving every minute of it. I love taking challenging projects (to the point it makes me frustrated and pull my hair out. LOL) as it helps me know which areas I should improve and become better programmer.
                            </p>
                        </div>
                    </div>            
                </div>

                <div id="achievements">
                    <div class="row">
                        <div class="class large-12 columns">
                            <h3>Achievements</h3>
                                
                            <ul>
                                <li>
                                    <strong><span class="highlightText">CLD9 Media - </span> Professional of the Year 2015</strong>
                                    <p>In recognition of outstanding performance, dedicated service and innovative contributions throughout the year.</p>
                                </li>

                                <li>
                                    <strong><span class="highlightText">CLD9 Media - </span> Champion of the Month June 2015</strong>
                                    <p>In recognition of can­do attitude, mentoring colleagues, and being an awesome team member.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="callToAction">
                    <div class="row">
                        <div class="large-12 columns">
                            <span class="callToAction highlightText">Have a project? Let's chat</span>
                            <h3><a href="mailto:aomanansala@gmail.com">aomanansala@gmail.com</a></h3>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@stop