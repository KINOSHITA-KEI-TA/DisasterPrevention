// alert('aaa')
const keyword = document.getElementById('keyword');

keyword.addEventListener('input', (e) => {
    console.log('e', e)
})

console.log('keyword', keyword)



//

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
        const selectedResult = document.querySelector(`.search-result[data-item-id="${selectedItemId}"]`);
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
        selectedItemId = result.getAttribute('data-item-id');

        // 検索結果の選択状態を更新
        updateSelected();
    });
});
