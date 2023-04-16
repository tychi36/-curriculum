$(function () {
    var like = $('.js-like-toggle');
    var likePostId;
    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');//data('指定の名前')でviewのdata-postid(指定の名前)を取得できる
        $.ajax({
                //ルール的な記述(headers)
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/posts_like',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'post_id': likePostId //コントローラーに渡すパラメーター post_idというデータ名でurlで指定をしたところへlikepostidを渡す
                },
        })
        //ここまでで一度urlにdataの中身を送る。Routeを経由してControllerへ
    

            //controllerからreturn responseがきたらdone、来なかったらfailへ
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
                console.log(data);
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });