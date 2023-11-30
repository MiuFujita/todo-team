<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset ('css/share.css') }}">
</head>
<body>
    <header>
        <div class="header-text">
            <div class="header-left">
                <p>ToDoList</p>
            </div>
            <div class="header-right">
                <p class="mytodo">
                    {{-- <a href="{{ route ('mytodo') }}"> --}}
                        My To Do
                    {{-- </a> --}}
                </p>
                <p class="newcreate">
                    {{-- <a href="{{  }}"> --}}
                    新規作成
                    {{-- </a> --}}
                </p>
            </div>
        </div>
    </header>

    <main>
        <div class="share-main">
            Weekly To Do
        </div>
        <fieldset class="share-box">
            <div class="monday">
                <legend>Monday</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>
            <div class="tuesday">
                <legend>Tuesday</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>
            <div class="wednesday">
                <legend>Wednesday</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>
            <div class="thursday">
                <legend>Thursday</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>
            <div class="fryday">
                <legend>Fryday</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>
            <div class="saturday">
                <legend>Saturday</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>
            <div class="sunday">
                <legend>Sunday</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>
            <div class="others">
                <legend>Others</legend>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    あいうえお</span>
                </div>
                <div class="checkbox">
                  <input type="checkbox"/>
                  <span>
                    {{-- <a href="{{  }}"></a> --}}
                    かきくけこ</span>
                </div>    
            </div>

        </fieldset>
          
    </main>
</body>
</html>