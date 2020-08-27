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
    <table class="rates">
        <tr>
            <td>Rates</td>
            <td>Block</td>
            <td>Cement</td>
        </tr>
        <tr>
            <td>Local</td>
            <td>
                <img src="{{asset('assets/images/rate-down.svg')}}" alt="">
                &#8358 200
            </td>
            <td>
                <img src="{{asset('assets/images/rate-up.svg')}}" alt="">
                &#8358 2000
            </td>
        </tr>
        <tr>
            <td>International</td>
            <td>
                <img src="{{asset('assets/images/rate-down.svg')}}" alt="">
                $2
            </td>
            <td>
                <img src="{{asset('assets/images/rate-up.svg')}}" alt="">
                $2
            </td>
        </tr>
    </table>
    <div class="user-controls">
        <div class="notifications">

        </div>
        <a class="user" href="{{url('admin/settings')}}">
            <img src="{{auth()->user()->avatar_url}}"
                 height="36" width="36" style="border-radius: 30px; border: 1px #502274 solid" alt="">
        </a>
        <a class="logout" href="{{url('logout')}}">Logout</a>
    </div>
</div>
