@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ url('auth/insertgame/submit') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            <h2>Insert New Game</h2><br>
            <!-- COMMUNITY -->
            <div class="form-group">
                <label for="community">Game Community:</label>
                <select id="community" class="form-control" name="community" required>
                    <option value="Mafia Universe">Mafia Universe</option>
                </select>
            </div>
            <!-- GAME URL -->
            <div class="form-group">
                <label for="url">Game URL:</label>
                <input type="text" id="url" name="url" class="form-control" placeholder="Copy/Paste Game URL page 1 here" required>
                <button id="checkurl" name="checkurl" class="button">Check if game already is in database</button>
            </div>
            <!-- GAME TITLE -->
            <div class="form-group">
                <label for="title">Game Title:</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Copy/Paste Game Title here" required>
            </div>
            <!-- GAME START DATE -->
            <div class="form-group">
                <label for="date">Start Day:</label>
                <input type="date" id="date" name="date" class="form-control" required min="2005-01-01" required>
            </div>
            <!-- GAME TYPE -->
            <div class="form-group">
                <label for="gametype">Game Type:</label>
                <select class="form-control" id="gametype" name="gametype" required>
                    <option value="Open">Open</option>
                    <option value="Semi-open">Semi-open</option>
                    <option value="Closed">Closed</option>
                    <option value="Bastard">Bastard</option>
                </select>
            </div>
            <!-- GAME SETUP NAME -->
            <div class="form-group">
                <label for="gamesetup">Game Setup Name:</label>
                <input type="text" id="gamesetup" name="gamesetup" class="form-control" placeholder="Example: 'Vanilla'">
            </div>
            <!-- WAS IT A TURBO? CHECKBOX -->
            <div class="form-group">
                <input type="checkbox" id="wasitturbo" name="wasitturbo" value="1" class="form-inline">
                <label for="wasitturbo">Check if it was a turbo game: </label>
                (day/night phases lasting less than an hour each)
            </div>
            <!-- TOTAL POST COUNT -->
            <div class="form-group">
                <label for="postcount">Total Post Count:</label>
                <p>Enter approximate number if circumstances make the total post count difficult to precisely indicate</p>
                <input type="text" id="postcount" name="postcount" class="form-control" placeholder="Enter number" required>
            </div>
            <!-- PHASE LENGTH DAY/NIGHT -->
            <div class="form-group">
                <h4><b>Phase lengths in hours(minutes for turbos):</b></h4>
                <label for="daylength">Day Phase Length: </label>
                <input type="text" id="daylength" name="daylength" value="0" required>
                <label for="nightlength">Night Phase Length: </label>
                <input type="text" id="nightlength" name="daylength" value="0" required>
            </div>
            <!-- CHECK IF GAME INCLUDED CHECKBOXES -->
            <div class="form-group">
                <h4><b>Check if game included any of the following:</b></h4>
                @foreach($gamemodificationtypes as $gamemodificationtype)
                    <input type="checkbox" id="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}" name="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}" value="1" class="form-inline">
                    <label for="gamemodificaiton{{ $gamemodificationtype->game_modification_type_id }}">{{ $gamemodificationtype->modification_type_name }}</label>
                    <br>
                @endforeach
            </div>
            <!-- GAME DESCRIPTION -->
            <div class="form-group">
                <label for="description">Game Description:</label>
                <p>Write here if you want to leave a short comment about the game.</p>
                <textarea rows="2" cols="50" name="description" id="description" class="form-control"></textarea>
            </div>
            <!-- GAME MAIN HOST -->
            <div class="form-group">
                <p><b>Hosts:</b></p>
                <label for="mainhost">Main Host:</label>
                <input type="text" id="mainhost" name="mainhost" class="form-control" placeholder="Enter username" required>
            </div>
            <!-- BUTTONS TO ADD/REMOVE HOSTS-->
            <div class="form-group">
                <button class="button btn-success" id="addhost" name="addhost" onclick="addHost()">Add host</button>
            </div>
            <!-- DIV FOR ADDED HOSTS TO APPEAR -->
            <div id="hostdiv">

            </div><br>
            <!-- BUTTONS TO ADD/REMOVE TEAMS-->
            <div class="form-group">
                <p><b>Teams:</b></p>
                <button class="button btn-success" id="addteam" name="addteam" onclick="addTeam()">Add team</button>
            </div>
            <!-- DIV FOR ADDED HOSTS TO APPEAR -->
            <div id="teamdiv">

            </div><br>

        </form>
    </div>

    <script type="text/javascript">
        alertNumber("tteest");
    </script>


@endsection