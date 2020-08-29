<div class="top">
    <button class="sidenav-btn">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </button>

    <div class="back">
        <img src="{{asset('assets/images/back.svg')}}" alt="">
        <a href="">Back</a>
    </div>
    {{--    @section('links')--}}
    <style>

        #toggled-element {
            /*max-width: 250px;*/
            /*overflow-x: scroll;*/

        }

        #toggled-element tr {
            display: block;
            float: left;
        }

        #toggled-element td {
            display: block;
            font-size: 10px;
            font-family: 'Montserrat-Regular', sans-serif;
            margin-right: 35px;
        }

        #toggled-element td:nth-of-type(1) {
            font-weight: bold;
            font-size: 12px;
            font-family: 'Montserrat-SemiBold';
        }

        td .boldtext {
            font-weight: bold;
            /*font-size: 12px;*/
            font-family: 'Montserrat-SemiBold';
        }


        @media(max-width: 575px){
            #toggled-element{
                display: none;
            }
        }
        @media(min-width: 576px){
            #toggled-element{
                display: block;
            }
        }


    </style>
    {{--    @stop--}}

    <table  id="toggled-element">
        <tbody>
        <tr class="boldtext">
            <td>Material</td>
            <td>Local Rate</td>
            <td>International Rate</td>
        </tr>
        @foreach(\App\Material::get() as $mat)
            <tr>
                <td style="font-weight: bold!important; font-size: 10px">{{$mat->name}}</td>
                <td>&#8358 {{$mat->local}}</td>
                <td>$ {{$mat->international}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="user-controls">
        <div class="notifications">

        </div>
        <a class="user" href="{{url('settings')}}">
            <img src="{{auth()->user()->avatar_url}}"
                 height="36" width="36" style="border-radius: 30px; border: 1px #502274 solid" alt="">
        </a>
        <a class="logout" href="{{url('logout')}}">Logout</a>
    </div>
</div>
