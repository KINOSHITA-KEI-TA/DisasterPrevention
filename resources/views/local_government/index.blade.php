<!-- index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>検索機能</title>
</head>
<body>
    <form action="{{ route('local_government.search') }}" method="POST">
        @csrf
        <label for="query">キーワード：</label>
        <input type="text" name="query" id="keyword">
        <button type="submit">検索</button>
    </form>

    <hr>

    @if (isset($local_governments))
        <div id="search-results">
            @foreach ($local_governments as $local_government)
            <div class="search-result" data-local_government-id="{{ $local_government->id }}">
                <h3>{{ $local_government->name }}</h3>
                <form method="POST" action="{{ route('local_government.save') }}">
                    @csrf
                    
                    <input type="hidden" name="local_government_id" value="{{ $local_government->id }}" id="local_government_id">
                    <button class="select-button">選択する</button>
                </form>
                <hr>
            </div>
            @endforeach
        </div>

        <button id="save-button" disabled>保存する</button>
    @endif

    <script>
        // 検索結果の要素を取得
        const searchResults = document.querySelectorAll('.search-result');

        // 選択された検索結果のIDを保持する変数
        let selectedItemId = null;

        // 検索結果の選択状態を更新する関数
        const updateSelected = () => {
            // すべての検索結果の選択状態をリセット
            searchResults.forEach(result => {
                result.classList.remove('selected');
                result.querySelector('.select-button').textContent = '選択する';
            });

            // 選択された検索結果の選択状態を設定
            if (selectedItemId) {
                const selectedResult = document.querySelector(`.search-result[data-local_government-id="${selectedItemId}"]`);
                selectedResult.classList.add('selected');
                selectedResult.querySelector('.select-button').textContent = '選択中';
            }

            // 保存ボタンの有効/無効を切り替え
            const saveButton = document.querySelector('#save-button');
            if (selectedItemId) {
                saveButton.removeAttribute('disabled');
            } else {
                saveButton.setAttribute('disabled', true);
            }
        };

        // 検索結果の選択状態を更新
        updateSelected();

        // 検索結果のクリックイベントを設定
        searchResults.forEach(result => {
            result.addEventListener('click', () => {
                // 選択された検索結果のIDを更新
                selectedItemId = result.getAttribute('data-local_government-id');

                // 検索結果の選択状態を更新
                updateSelected();
            });
        });
    </script>
</body>
</html>
