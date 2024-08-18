const shop = document.getElementById('shop')

// console.log(bookData);

let bookShop = () => {
    shop.innerHTML = bookData.map((x) =>{
        let {id,bookname,img,author,course,price,date} = x

        return `
            <table>
            <h2>${course} Book Table</h2>
          <tr>
            <th>Id</th>
            <th>Book Name</th>
            <th>Image</th>
            <th>Author</th>
            <th>Course</th>
            <th>Date</th>
            <th>Add to Cart</th>
          </tr>
          <tr>
            <td>${id}</td>
            <td>${bookname}</td>
            <td><img src="${img}" alt="dsabook" width="80" height="90"></td>
            <td>${author}</td>
            <td>${course}</td>
            <td>${date}</td>
            <td><button type="submit" style="margin: 4px 20px; padding: 5px 20px;">Add</button></td>
          </tr>
          
        </table>
        `
    })
}

bookShop()