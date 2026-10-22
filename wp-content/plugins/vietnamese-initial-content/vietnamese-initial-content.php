<?php
/**
 * Plugin Name: Nội dung khởi tạo tiếng Việt
 * Description: Tạo các chuyên mục và bài viết giáo dục tài chính ban đầu theo cách idempotent.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

defined( 'ABSPATH' ) || exit;

function vn_finance_initial_content_items() {
	return array(
		array(
			'name' => 'Vĩ mô',
			'slug' => 'vi-mo',
		),
		array(
			'name' => 'Chứng khoán',
			'slug' => 'chung-khoan',
		),
		array(
			'name' => 'Kiến thức tài chính',
			'slug' => 'kien-thuc-tai-chinh',
		),
	);
}

function vn_finance_initial_content_posts() {
	return array(
		array(
			'title' => 'Vì sao lãi suất ảnh hưởng đến thị trường chứng khoán?',
			'slug' => 'vi-sao-lai-suat-anh-huong-thi-truong-chung-khoan',
			'category' => 'vi-mo',
			'excerpt' => 'Lãi suất tác động đến chi phí vốn, lợi nhuận doanh nghiệp và cách nhà đầu tư định giá dòng tiền tương lai. Bài viết giải thích mối liên hệ này một cách có hệ thống.',
			'content' => <<<'HTML'
<p>Lãi suất thường xuất hiện trong các cuộc thảo luận về thị trường chứng khoán, nhưng tác động của nó không phải là một công tắc đơn giản: lãi suất giảm thì mọi cổ phiếu tăng, còn lãi suất tăng thì mọi cổ phiếu giảm. Lãi suất truyền dẫn qua nhiều kênh, từ chi phí đi vay của doanh nghiệp đến mức lợi nhuận mà nhà đầu tư yêu cầu khi mua một tài sản rủi ro. Hiểu các kênh này giúp đọc diễn biến thị trường thận trọng hơn, thay vì chỉ phản ứng với một con số chính sách.</p>
<h2>Chi phí vốn và lợi nhuận doanh nghiệp</h2>
<p>Khi lãi suất thị trường tăng, khoản vay mới thường trở nên đắt hơn và các khoản vay thả nổi có thể làm chi phí lãi vay tăng. Nếu doanh thu chưa kịp cải thiện, lợi nhuận trước thuế và dòng tiền dành cho cổ đông sẽ chịu áp lực. Doanh nghiệp có đòn bẩy cao, thời hạn tái cấp vốn gần hoặc dòng tiền hoạt động chưa ổn định thường nhạy cảm hơn với thay đổi này.</p>
<p>Lãi suất cũng ảnh hưởng đến quyết định đầu tư. Một dự án nhà máy, cửa hàng hay hệ thống công nghệ chỉ hợp lý khi lợi ích kỳ vọng đủ lớn so với chi phí vốn và rủi ro. Chi phí tài trợ cao có thể khiến doanh nghiệp trì hoãn dự án, ưu tiên củng cố bảng cân đối hoặc thận trọng hơn trong tuyển dụng. Ngược lại, lãi suất thấp hơn có thể mở rộng số dự án đạt ngưỡng hiệu quả, nhưng hiệu ứng còn phụ thuộc vào nhu cầu sản phẩm và niềm tin kinh doanh.</p>
<h2>Vì sao tỷ lệ chiết khấu làm thay đổi định giá?</h2>
<p>Giá trị cổ phiếu là giá trị hiện tại của những dòng tiền mà nhà đầu tư kỳ vọng nhận được trong tương lai. Trong mô hình chiết khấu dòng tiền (DCF), mỗi dòng tiền tương lai được quy đổi về hôm nay bằng một tỷ lệ chiết khấu phản ánh thời gian và rủi ro. Công thức khái quát là: <strong>giá trị hiện tại = dòng tiền tương lai / (1 + tỷ lệ chiết khấu) theo số kỳ</strong>.</p>
<p>Ví dụ khái niệm, một dòng tiền 110 đơn vị nhận sau một năm có giá trị hiện tại là 100 nếu tỷ lệ chiết khấu là 10%. Nếu tỷ lệ này tăng lên 20%, cùng dòng tiền chỉ còn giá trị hiện tại khoảng 91,7 đơn vị. Dòng tiền không đổi, nhưng giá trị hôm nay giảm vì nhà đầu tư đòi hỏi mức sinh lời cao hơn để chờ đợi và chịu rủi ro. Trong thực tế, DCF còn phụ thuộc vào dự báo tăng trưởng, biên lợi nhuận, đầu tư vốn và giá trị cuối kỳ; do đó đây là khung suy nghĩ, không phải chiếc máy cho ra một mức giá chắc chắn.</p>
<h2>Mỗi nhóm ngành phản ứng theo một cách</h2>
<p>Các doanh nghiệp tăng trưởng thường có phần lớn dòng tiền nằm ở tương lai xa, nên định giá có thể nhạy cảm với tỷ lệ chiết khấu. Doanh nghiệp tiện ích hoặc bất động sản có thể chịu ảnh hưởng đáng kể từ chi phí nợ và khả năng tái cấp vốn. Ngân hàng lại có cơ chế khác: thu nhập chịu tác động của chênh lệch giữa lãi suất cho vay và chi phí huy động, chất lượng tài sản và nhu cầu tín dụng.</p>
<p>Một số doanh nghiệp có tiền mặt lớn hoặc quyền lực định giá có thể chống chịu tốt hơn. Ngành hưởng lợi từ chu kỳ hàng hóa, xuất khẩu hay tiêu dùng thiết yếu cũng có những động lực riêng. Vì vậy, cùng một quyết định lãi suất nhưng phản ứng của từng ngành còn tùy thuộc vào cơ cấu nợ, kỳ hạn dòng tiền, sức cầu và vị thế cạnh tranh.</p>
<h2>Lãi suất giảm không đồng nghĩa cổ phiếu chắc chắn tăng</h2>
<p>Lãi suất có thể giảm vì lạm phát hạ nhiệt trong một nền kinh tế ổn định, nhưng cũng có thể giảm vì tăng trưởng suy yếu. Trong trường hợp thứ hai, lợi ích từ chi phí vốn thấp hơn có thể bị lấn át bởi doanh thu và lợi nhuận kỳ vọng giảm. Ngoài ra, giá cổ phiếu phản ánh kỳ vọng chứ không chỉ phản ánh hiện tại. Nếu thị trường đã dự đoán đầy đủ việc hạ lãi suất, giá có thể không tăng thêm khi quyết định chính thức được công bố.</p>
<h2>Kỳ vọng khác với quyết định chính sách</h2>
<p>Nhà đầu tư thường điều chỉnh giá ngay khi dữ liệu kinh tế, phát biểu của cơ quan tiền tệ hoặc biến động thị trường làm thay đổi xác suất cho các kịch bản lãi suất. Đến ngày công bố, một quyết định đúng như kỳ vọng có thể tạo ra phản ứng nhỏ; một quyết định bất ngờ hoặc thông điệp về các bước tiếp theo mới có thể gây biến động lớn. Cần phân biệt mức lãi suất được công bố với toàn bộ thông điệp về lạm phát, tăng trưởng và rủi ro tài chính.</p>
<p>Do đó, phân tích tác động của lãi suất nên bắt đầu bằng câu hỏi: điều gì đã được phản ánh trong giá, và điều gì có thể thay đổi triển vọng lợi nhuận? Đây là cách tiếp cận cân bằng hơn so với việc gắn nhãn tăng hoặc giảm cho toàn bộ thị trường.</p>
<h2>Kết luận</h2>
<p>Lãi suất ảnh hưởng đến chứng khoán thông qua chi phí vốn, lợi nhuận, quyết định đầu tư và tỷ lệ chiết khấu. Tác động cuối cùng phụ thuộc vào cấu trúc tài chính của doanh nghiệp, kỳ vọng đã phản ánh trong giá và nguyên nhân khiến chính sách thay đổi. Bài viết mang tính giáo dục, không phải khuyến nghị mua bán cá nhân.</p>
HTML,
		),
		array(
			'title' => 'Cách phân tích cổ phiếu ngân hàng trước khi đầu tư',
			'slug' => 'cach-phan-tich-co-phieu-ngan-hang',
			'category' => 'chung-khoan',
			'excerpt' => 'Một khung phân tích cổ phiếu ngân hàng cần nhìn đồng thời vào biên lãi ròng, hiệu quả vốn, chất lượng tài sản, tăng trưởng tín dụng và mức định giá.',
			'content' => <<<'HTML'
<p>Cổ phiếu ngân hàng thường được nhìn qua lợi nhuận và mức định giá, nhưng ngân hàng là doanh nghiệp đặc biệt: phần lớn tài sản là các khoản tín dụng và phần lớn nguồn vốn đến từ tiền gửi hoặc các nguồn vay. Vì vậy, một năm lợi nhuận cao chưa đủ để kết luận về chất lượng. Nhà đầu tư cần xem lợi nhuận được tạo ra như thế nào, rủi ro đang tích tụ ở đâu và vốn có đủ sức hấp thụ tổn thất hay không.</p>
<h2>Biên lãi ròng cho biết chất lượng hoạt động cốt lõi</h2>
<p>Biên lãi ròng, thường viết tắt là NIM, là chênh lệch giữa thu nhập lãi và chi phí lãi, đặt trong tương quan với tài sản sinh lãi bình quân. Chỉ số này cho biết ngân hàng kiếm được bao nhiêu từ hoạt động trung gian tín dụng sau khi trả chi phí huy động. NIM cao có thể phản ánh khả năng định giá khoản vay, cơ cấu tài sản hoặc nguồn tiền gửi tốt; nhưng cũng có thể đi cùng rủi ro tín dụng cao hơn nếu ngân hàng cho vay các nhóm khách hàng nhiều biến động.</p>
<p>Không nên nhìn một quý riêng lẻ. Hãy xem NIM thay đổi qua nhiều kỳ, cùng chi phí vốn, tỷ trọng tiền gửi không kỳ hạn, cơ cấu cho vay và môi trường lãi suất. NIM giảm đôi khi là hệ quả của việc hỗ trợ khách hàng trong giai đoạn khó khăn, trong khi NIM tăng chưa chắc bền vững nếu đến từ việc đẩy mạnh các khoản vay rủi ro.</p>
<h2>ROE và câu hỏi lợi nhuận có bền vững không</h2>
<p>ROE, hay tỷ suất sinh lời trên vốn chủ sở hữu, đo lường lợi nhuận tạo ra trên mỗi đơn vị vốn của cổ đông. ROE cao thường hấp dẫn, nhưng cần phân rã để hiểu nguồn gốc: biên lợi nhuận, hiệu quả sử dụng tài sản và đòn bẩy đều có thể tác động. Một ngân hàng đạt ROE cao nhờ dùng đòn bẩy lớn có thể nhạy cảm hơn khi nợ xấu tăng.</p>
<p>Nhà đầu tư cũng nên tách thu nhập lặp lại khỏi khoản bất thường, chẳng hạn thu nhập từ một giao dịch đơn lẻ hoặc hoàn nhập dự phòng. So sánh ROE với chi phí vốn chủ sở hữu là một cách đặt câu hỏi về việc ngân hàng có thực sự tạo giá trị, thay vì chỉ nhìn vào con số cao hay thấp.</p>
<h2>Chất lượng tài sản và nợ xấu</h2>
<p>Nợ xấu là các khoản vay có khả năng không thu hồi đầy đủ hoặc đúng hạn. Tỷ lệ nợ xấu công bố là điểm bắt đầu, không phải toàn bộ bức tranh. Cần xem thêm khoản vay cần chú ý, nợ đã cơ cấu, mức trích lập dự phòng, tỷ lệ bao phủ nợ xấu và tốc độ thu hồi tài sản bảo đảm. Nếu ngân hàng tăng trưởng nhanh nhưng dự phòng không theo kịp, lợi nhuận hiện tại có thể chưa phản ánh đầy đủ chi phí của rủi ro.</p>
<p>Chất lượng tài sản thường bộc lộ với độ trễ. Một khoản vay có thể vẫn được thanh toán trong thời gian đầu trước khi dòng tiền của người vay suy yếu. Vì vậy, theo dõi xu hướng theo quý và thuyết minh báo cáo tài chính quan trọng hơn việc chỉ so sánh một tỷ lệ tại một thời điểm.</p>
<h2>Tăng trưởng tín dụng: tốc độ không phải mục tiêu duy nhất</h2>
<p>Tăng trưởng tín dụng hỗ trợ doanh thu lãi và mở rộng quy mô, nhưng cho vay quá nhanh có thể làm suy yếu tiêu chuẩn thẩm định. Hãy đặt tốc độ tăng trưởng cạnh tăng trưởng tiền gửi, vốn tự có, khả năng quản trị rủi ro và chất lượng khách hàng. Một ngân hàng tăng trưởng chậm hơn nhưng giữ được biên lợi nhuận và nợ xấu ổn định có thể đáng tin cậy hơn ngân hàng tăng trưởng cao bằng mọi giá.</p>
<h2>Vốn và khả năng hấp thụ tổn thất</h2>
<p>Tỷ lệ an toàn vốn phản ánh mức đệm vốn so với tài sản có rủi ro. Vốn dày hơn giúp ngân hàng chịu được tổn thất, duy trì hoạt động và tiếp tục cấp tín dụng khi điều kiện xấu đi. Khi đánh giá, nên xem tỷ lệ này so với yêu cầu áp dụng, chất lượng của vốn, kế hoạch tăng vốn và tốc độ mở rộng tài sản. Một ngân hàng thiếu vốn có thể phải hạn chế tăng trưởng hoặc huy động vốn mới vào thời điểm bất lợi.</p>
<h2>P/B thấp có thực sự là rẻ?</h2>
<p>P/B, hay hệ số giá trên giá trị sổ sách, so sánh giá thị trường với giá trị vốn chủ sở hữu trên mỗi cổ phần. Do ngân hàng ghi nhận nhiều tài sản và nợ trên bảng cân đối, P/B thường được sử dụng cùng ROE. P/B thấp có thể phản ánh cơ hội, nhưng cũng có thể là tín hiệu thị trường đang chiết khấu chất lượng tài sản thấp, lợi nhuận suy giảm, quản trị yếu hoặc nhu cầu tăng vốn.</p>
<p>Cách so sánh hợp lý là đặt các ngân hàng có mô hình tương đồng cạnh nhau: bán lẻ hay doanh nghiệp, tập trung vào tín dụng hay phí dịch vụ, mức độ rủi ro và chất lượng quản trị. Một ngân hàng có P/B cao hơn nhưng ROE bền vững, vốn tốt và nợ xấu được kiểm soát có thể được định giá hợp lý hơn ngân hàng P/B thấp.</p>
<h2>Giới hạn của phân tích</h2>
<p>Báo cáo tài chính dựa trên dữ liệu quá khứ, còn nợ xấu và chu kỳ tín dụng có thể thay đổi nhanh. Các chỉ số giữa ngân hàng cũng có thể khác nhau do phương pháp phân loại, mức độ công bố và mô hình kinh doanh. Vì vậy, không nên dùng một chỉ số để quyết định. Hãy kết hợp nhiều kỳ báo cáo, thuyết minh, bối cảnh ngành và khả năng chịu các kịch bản bất lợi.</p>
<p>Đây là khung học tập chung, không phải lời khuyên đầu tư cá nhân. Mỗi quyết định cần phù hợp với mục tiêu, thời hạn và mức chịu rủi ro của người đọc.</p>
HTML,
		),
		array(
			'title' => 'Hiểu đúng về lạm phát, lợi suất trái phiếu và sức mua',
			'slug' => 'lam-phat-loi-suat-trai-phieu-va-suc-mua',
			'category' => 'kien-thuc-tai-chinh',
			'excerpt' => 'Lạm phát làm thay đổi sức mua, còn lợi suất trái phiếu ảnh hưởng đến định giá nhiều loại tài sản. Bài viết trình bày các mối liên hệ quan trọng và những điểm cần thận trọng.',
			'content' => <<<'HTML'
<p>Một khoản tiền có thể giữ nguyên con số nhưng không giữ nguyên sức mua. Khi mặt bằng giá hàng hóa và dịch vụ tăng theo thời gian, cùng một số tiền sẽ mua được ít hơn. Lạm phát vì thế không chỉ là một chỉ báo kinh tế; nó còn ảnh hưởng đến thu nhập thực, chi phí vay, quyết định tiết kiệm và cách thị trường định giá tài sản.</p>
<h2>Lạm phát làm suy giảm sức mua như thế nào?</h2>
<p>Lạm phát là sự tăng lên có tính lan tỏa của mức giá chung trong nền kinh tế. Nếu giá tăng không đồng đều, trải nghiệm của mỗi hộ gia đình sẽ khác nhau tùy vào tỷ trọng thực phẩm, nhà ở, giáo dục hay dịch vụ trong ngân sách. Điều quan trọng là phân biệt thay đổi giá của một mặt hàng với xu hướng của mặt bằng giá chung.</p>
<p>Sức mua chịu ảnh hưởng khi thu nhập danh nghĩa tăng chậm hơn giá cả. Ngược lại, nếu thu nhập tăng nhanh hơn lạm phát, thu nhập thực có thể cải thiện. Đây là lý do khi đánh giá lãi suất tiền gửi hoặc tiền lương, cần hỏi phần tăng thêm có vượt tốc độ tăng giá hay không.</p>
<h2>Lãi suất danh nghĩa và lợi suất thực</h2>
<p>Lãi suất danh nghĩa là mức được công bố trên hợp đồng hoặc công cụ tài chính, chưa điều chỉnh theo lạm phát. Lợi suất thực cố gắng đo phần sức mua tăng thêm sau khi tính đến lạm phát. Cách gần đúng là: <strong>lợi suất thực ≈ lợi suất danh nghĩa − tỷ lệ lạm phát</strong>. Chẳng hạn, lợi suất danh nghĩa 6% trong bối cảnh lạm phát 4% tương ứng với lợi suất thực gần 2%, trước thuế và các chi phí khác.</p>
<p>Trong đầu tư, lạm phát kỳ vọng mới là biến số đặc biệt quan trọng. Một trái phiếu trả dòng tiền cố định có thể kém hấp dẫn nếu nhà đầu tư dự đoán sức mua của dòng tiền đó sẽ giảm nhanh hơn. Khi đó, họ có thể yêu cầu lợi suất danh nghĩa cao hơn để bù đắp.</p>
<h2>Vì sao giá trái phiếu và lợi suất đi ngược chiều?</h2>
<p>Hãy hình dung một trái phiếu cũ cam kết trả khoản tiền cố định mỗi năm. Nếu trái phiếu mới trên thị trường bắt đầu trả mức lợi suất cao hơn, trái phiếu cũ sẽ kém hấp dẫn nếu vẫn giữ nguyên giá. Để người mua chấp nhận trái phiếu cũ, giá của nó thường phải giảm; khi giá giảm, lợi suất tính trên số tiền bỏ ra tăng lên. Vì vậy, giá của trái phiếu đang lưu hành và lợi suất của nó thường biến động ngược chiều.</p>
<p>Mối quan hệ này là cơ học, nhưng mức thay đổi phụ thuộc vào kỳ hạn và dòng tiền. Trái phiếu có kỳ hạn dài thường nhạy cảm hơn với thay đổi lợi suất vì phần lớn dòng tiền nằm xa trong tương lai. Đây là lý do cùng một cú dịch chuyển lợi suất có thể tạo ra mức biến động khác nhau giữa các loại trái phiếu.</p>
<h2>Kỳ vọng lạm phát và chính sách tiền tệ</h2>
<p>Nếu doanh nghiệp, người lao động và nhà đầu tư cùng kỳ vọng giá tiếp tục tăng, họ có thể điều chỉnh giá bán, tiền lương và yêu cầu lợi suất. Kỳ vọng đó có thể tự củng cố nếu không được neo giữ tốt. Cơ quan tiền tệ thường theo dõi lạm phát thực tế, kỳ vọng, tăng trưởng và điều kiện tài chính để cân nhắc mức độ thắt chặt hoặc nới lỏng.</p>
<p>Lợi suất trái phiếu cũng không chỉ phản ánh lãi suất chính sách hiện tại. Nó có thể bao gồm kỳ vọng về các mức lãi suất tương lai, bù đắp lạm phát, rủi ro kỳ hạn và cung cầu trái phiếu. Do đó, lợi suất có thể tăng trước khi chính sách thay đổi nếu thị trường đã điều chỉnh kỳ vọng.</p>
<h2>Tác động tới cổ phiếu và chi phí vay</h2>
<p>Lợi suất tăng có thể làm chi phí vay của doanh nghiệp và hộ gia đình cao hơn, từ đó ảnh hưởng đến đầu tư, tiêu dùng và lợi nhuận. Trong định giá cổ phiếu, lợi suất trái phiếu thường là một thành phần của mức sinh lời tham chiếu hoặc tỷ lệ chiết khấu. Khi tỷ lệ chiết khấu tăng, giá trị hiện tại của dòng tiền tương lai có xu hướng giảm, đặc biệt với doanh nghiệp có dòng tiền kỳ vọng nằm xa.</p>
<p>Tuy nhiên, tác động không chỉ có một chiều. Lợi suất tăng vì nền kinh tế khỏe hơn có thể đi cùng triển vọng doanh thu tốt hơn cho một số doanh nghiệp. Ngành có khả năng chuyển chi phí vào giá bán, bảng cân đối lành mạnh hoặc dòng tiền ngắn hạn có thể phản ứng khác ngành phụ thuộc nặng vào vốn vay.</p>
<h2>Không có công thức đơn giản cho giá tài sản</h2>
<p>Lạm phát, lợi suất và giá tài sản tương tác thông qua kỳ vọng. Lạm phát giảm có thể kéo lợi suất giảm, nhưng nếu tăng trưởng suy yếu mạnh thì cổ phiếu vẫn chịu áp lực. Ngược lại, lạm phát cao nhưng được xem là tạm thời có thể không khiến lợi suất dài hạn tăng tương ứng. Cung cầu, rủi ro địa chính trị, tài khóa và dòng vốn quốc tế cũng có thể làm các mối quan hệ quen thuộc trở nên phức tạp.</p>
<h2>Kết luận</h2>
<p>Để hiểu một biến động trên thị trường, hãy tách lãi suất danh nghĩa khỏi lợi suất thực, phân biệt giá trái phiếu với lợi suất và theo dõi kỳ vọng thay vì chỉ nhìn số liệu hiện tại. Đây là kiến thức nền tảng giúp đặt câu hỏi đúng; nó không thay thế việc đọc tài liệu phát hành, báo cáo tài chính và đánh giá rủi ro phù hợp với từng người.</p>
HTML,
		),
	);
}

function vn_finance_additional_content_posts() {
	return array(
		array(
			'title' => 'GDP tăng trưởng nói lên điều gì về sức khỏe nền kinh tế?',
			'slug' => 'gdp-tang-truong-va-suc-khoe-nen-kinh-te',
			'category' => 'vi-mo',
			'excerpt' => 'GDP giúp đo quy mô hoạt động kinh tế, nhưng cần đọc cùng chất lượng tăng trưởng, chu kỳ, thu nhập và các chỉ báo phúc lợi khác.',
			'content' => <<<'HTML'
<p>GDP thường được nhắc đến đầu tiên khi đánh giá một nền kinh tế. Một con số tăng trưởng cao có thể cho thấy hoạt động sản xuất, tiêu dùng hoặc đầu tư đang mở rộng, nhưng không tự động trả lời nền kinh tế có khỏe mạnh hay đời sống người dân có tốt hơn hay không. Để đọc GDP đúng cách, cần hiểu nó đo gì, tăng trưởng đến từ đâu và đâu là những phần thông tin mà chỉ tiêu này không thể bao quát.</p>
<h2>GDP đo quy mô hoạt động kinh tế</h2>
<p>Tổng sản phẩm trong nước, hay GDP, là giá trị thị trường của hàng hóa và dịch vụ cuối cùng được sản xuất trong phạm vi một nền kinh tế trong một khoảng thời gian. Chỉ tính sản phẩm cuối cùng giúp tránh cộng trùng các đầu vào đã được dùng trong quá trình sản xuất. GDP có thể được trình bày theo giá hiện hành hoặc giá so sánh để phục vụ những mục đích khác nhau.</p>
<p>GDP danh nghĩa phản ánh cả lượng sản phẩm và mức giá. Nếu giá tăng trong khi sản lượng không đổi, GDP danh nghĩa vẫn có thể tăng. GDP thực cố gắng loại ảnh hưởng của thay đổi giá để cho thấy sản lượng thay đổi như thế nào. Khi nói “tăng trưởng GDP”, cần kiểm tra đang đề cập đến tăng trưởng thực hay danh nghĩa.</p>
<h2>Tăng trưởng đến từ những động lực nào?</h2>
<p>Ở góc độ chi tiêu, GDP thường được phân tích qua tiêu dùng hộ gia đình, đầu tư, chi tiêu của khu vực công và xuất khẩu ròng. Tiêu dùng tăng có thể phản ánh thu nhập và niềm tin tốt hơn, nhưng cũng cần xem có dựa quá nhiều vào vay nợ hay không. Đầu tư mở rộng năng lực sản xuất có thể tạo nền tảng dài hạn; ngược lại, một đợt tăng ngắn do tồn kho hoặc dự án một lần có thể không bền vững.</p>
<p>Xuất khẩu hỗ trợ tăng trưởng và tạo việc làm trong các ngành hướng ra bên ngoài, nhưng cũng khiến nền kinh tế nhạy cảm với nhu cầu quốc tế, tỷ giá và chuỗi cung ứng. Chi tiêu công có thể giúp ổn định hoạt động trong giai đoạn tư nhân thận trọng, song hiệu quả cuối cùng phụ thuộc vào chất lượng dự án và khả năng tạo năng suất.</p>
<h2>Chu kỳ kinh tế và cách đọc một quý tăng trưởng</h2>
<p>Nền kinh tế vận động theo chu kỳ: mở rộng, tăng tốc, chậm lại và đôi khi suy giảm. Một quý tăng trưởng thấp không nhất thiết là dấu hiệu khủng hoảng nếu nó đi sau giai đoạn tăng mạnh hoặc chịu yếu tố tạm thời. Ngược lại, tăng trưởng cao trong thời gian ngắn có thể là hiệu ứng nền thấp hoặc sự phục hồi sau gián đoạn.</p>
<p>Nhà phân tích nên nhìn chuỗi nhiều quý, so sánh với xu hướng dài hạn và xem các thành phần đóng góp. Tốc độ tăng trưởng giảm nhưng năng suất, đầu tư tư nhân và thu nhập thực cải thiện có thể là một câu chuyện khác với tăng trưởng cao nhưng dựa vào khai thác tài nguyên hoặc tín dụng tăng nóng.</p>
<h2>GDP không phải thước đo đầy đủ của thịnh vượng</h2>
<p>GDP không cho biết đầy đủ cách thu nhập được phân bổ, chất lượng môi trường, thời gian chăm sóc không được trả công, sức khỏe tinh thần hay mức độ an toàn của việc làm. GDP bình quân đầu người cũng chỉ là một mức trung bình, không mô tả chính xác trải nghiệm của từng nhóm dân cư. Một nền kinh tế có thể tăng quy mô nhưng một bộ phận người dân vẫn chịu áp lực chi phí sinh hoạt.</p>
<p>GDP còn có thể được điều chỉnh khi cơ quan thống kê cập nhật dữ liệu. Vì vậy, không nên phản ứng quá mạnh với một ước tính đầu tiên hoặc dùng nó để khẳng định chắc chắn triển vọng thị trường.</p>
<h2>Đọc GDP cùng các chỉ báo khác</h2>
<p>Để có bức tranh cân bằng, GDP nên được đặt cạnh lạm phát, việc làm, năng suất, thu nhập thực, đầu tư, tình hình doanh nghiệp và sức khỏe tài khóa. Một nền kinh tế đáng tin cậy hơn khi tăng trưởng đi cùng năng suất và khả năng chống chịu, thay vì chỉ đạt tốc độ cao trong một giai đoạn ngắn.</p>
<p>GDP là điểm bắt đầu hữu ích, không phải kết luận cuối cùng. Bài viết mang tính giáo dục; không nên dùng một chỉ tiêu vĩ mô đơn lẻ làm cơ sở cho quyết định đầu tư cá nhân.</p>
HTML,
		),
		array(
			'title' => 'Tỷ giá USD/VND ảnh hưởng đến doanh nghiệp và nhà đầu tư như thế nào?',
			'slug' => 'ty-gia-usd-vnd-anh-huong-doanh-nghiep-nha-dau-tu',
			'category' => 'vi-mo',
			'excerpt' => 'Biến động USD/VND truyền qua giá nhập khẩu, doanh thu xuất khẩu, nợ ngoại tệ và dòng vốn; tác động phụ thuộc vào cấu trúc từng doanh nghiệp.',
			'content' => <<<'HTML'
<p>Tỷ giá USD/VND là giá của đồng đô la Mỹ được biểu thị bằng đồng Việt Nam. Khi tỷ giá tăng, cần nhiều đồng Việt Nam hơn để đổi lấy một đô la; đồng Việt Nam được xem là yếu đi so với USD. Một thay đổi trên thị trường ngoại hối không tác động giống nhau đến mọi doanh nghiệp. Điều quan trọng là xem doanh nghiệp thu tiền bằng đồng nào, chi phí bằng đồng nào và có công cụ phòng vệ hay không.</p>
<h2>Cơ chế truyền dẫn của tỷ giá</h2>
<p>Tỷ giá ảnh hưởng trực tiếp đến giá hàng hóa nhập khẩu, nguyên liệu, máy móc và dịch vụ thanh toán bằng ngoại tệ. Nếu doanh nghiệp không thể điều chỉnh giá bán, chi phí đầu vào tăng có thể làm biên lợi nhuận giảm. Ở chiều ngược lại, doanh nghiệp xuất khẩu có doanh thu USD nhưng phần lớn chi phí bằng VND có thể chuyển đổi doanh thu thành nhiều đồng Việt Nam hơn khi tỷ giá tăng.</p>
<p>Tuy nhiên, doanh nghiệp xuất khẩu cũng có thể nhập nguyên liệu bằng USD, hoặc ký hợp đồng bán hàng dài hạn với mức giá cố định. Lợi ích từ tỷ giá vì thế không nên được suy ra chỉ từ việc doanh nghiệp có xuất khẩu hay không.</p>
<h2>Nhập khẩu, xuất khẩu và cạnh tranh</h2>
<p>Doanh nghiệp phụ thuộc vào hàng nhập khẩu thường chịu áp lực khi đồng nội tệ yếu đi. Một số doanh nghiệp có thể chuyển một phần chi phí vào giá bán, nhưng khả năng này phụ thuộc vào sức cạnh tranh và độ co giãn của nhu cầu. Nếu khách hàng nhạy cảm với giá, việc tăng giá có thể làm sản lượng giảm.</p>
<p>Doanh nghiệp xuất khẩu có thể hưởng lợi về doanh thu quy đổi, nhưng phải theo dõi tỷ giá của các đối thủ, giá hàng hóa quốc tế và nhu cầu của thị trường đích. Tỷ giá thuận lợi trong ngắn hạn không bù được việc đơn hàng, chất lượng sản phẩm hoặc năng lực giao hàng suy yếu.</p>
<h2>Nợ ngoại tệ và rủi ro lãi suất</h2>
<p>Một khoản vay bằng USD tạo ra nghĩa vụ trả nợ bằng USD. Nếu doanh thu của doanh nghiệp chủ yếu bằng VND, tỷ giá tăng có thể làm giá trị khoản nợ tính theo VND và chi phí trả nợ tăng. Ngược lại, doanh nghiệp có dòng tiền USD tự nhiên có thể dùng dòng tiền đó để phục vụ khoản vay.</p>
<p>Cần đọc thuyết minh về các khoản phải thu, phải trả, vay ngoại tệ và hợp đồng kỳ hạn. Rủi ro không chỉ nằm ở chênh lệch tỷ giá mà còn ở thời điểm dòng tiền, tài sản bảo đảm và điều khoản tái định giá lãi suất.</p>
<h2>Dòng vốn và tâm lý thị trường</h2>
<p>Chênh lệch lãi suất, kỳ vọng chính sách, cán cân thương mại và nhu cầu thanh toán quốc tế đều có thể ảnh hưởng đến dòng vốn. Khi nhà đầu tư quốc tế thay đổi phân bổ, thị trường cổ phiếu, trái phiếu và tỷ giá có thể biến động đồng thời. Dòng vốn rút ra không nhất thiết phản ánh đánh giá riêng về một doanh nghiệp, nhưng có thể làm thanh khoản và định giá thay đổi nhanh hơn.</p>
<h2>Ngành nào nhạy cảm hơn?</h2>
<p>Ngành hàng không, bán lẻ hàng nhập khẩu, sản xuất sử dụng nguyên liệu quốc tế và doanh nghiệp vay ngoại tệ thường cần phân tích tỷ giá kỹ. Doanh nghiệp xuất khẩu, du lịch đón khách quốc tế hoặc có tài sản và doanh thu ngoại tệ có thể có cơ chế tác động khác. Các ngân hàng còn chịu ảnh hưởng từ trạng thái ngoại tệ, nhu cầu phòng vệ và chất lượng khách hàng vay.</p>
<h2>Cách phân tích thận trọng</h2>
<p>Hãy lập bảng doanh thu, chi phí, tài sản và nợ theo từng loại tiền; sau đó xem tỷ giá thay đổi sẽ ảnh hưởng đến lợi nhuận và dòng tiền ra sao. Đây chỉ là phân tích độ nhạy, không phải dự báo chắc chắn. Hợp đồng phòng vệ có thể giảm biến động nhưng cũng có chi phí và rủi ro đối tác.</p>
<p>Tỷ giá là một biến số quan trọng, nhưng giá cổ phiếu còn phản ánh tăng trưởng, lợi nhuận, định giá và kỳ vọng. Bài viết mang tính giáo dục, không phải khuyến nghị đầu tư cá nhân.</p>
HTML,
		),
		array(
			'title' => 'Ngân hàng Nhà nước điều hành chính sách tiền tệ bằng những công cụ nào?',
			'slug' => 'ngan-hang-nha-nuoc-cong-cu-chinh-sach-tien-te',
			'category' => 'vi-mo',
			'excerpt' => 'Chính sách tiền tệ tác động đến thanh khoản, lãi suất và điều kiện tín dụng qua nhiều công cụ; mỗi công cụ có tốc độ và phạm vi truyền dẫn khác nhau.',
			'content' => <<<'HTML'
<p>Chính sách tiền tệ là cách cơ quan tiền tệ điều tiết tiền và tín dụng nhằm góp phần ổn định giá trị đồng tiền, hỗ trợ hoạt động kinh tế và duy trì an toàn hệ thống. Một quyết định chính sách không đi thẳng từ phòng họp đến giá cổ phiếu; nó truyền qua thị trường tiền tệ, ngân hàng, doanh nghiệp và hộ gia đình. Vì vậy, cần hiểu từng công cụ cùng giới hạn của nó.</p>
<h2>Lãi suất điều hành phát tín hiệu chính sách</h2>
<p>Lãi suất điều hành là nhóm mức lãi suất tham chiếu cho các giao dịch và điều kiện trên thị trường tiền tệ. Khi lãi suất được điều chỉnh, chi phí vốn ngắn hạn của ngân hàng có thể thay đổi, từ đó tác động đến lãi suất huy động và cho vay. Mức truyền dẫn thực tế còn phụ thuộc thanh khoản, cạnh tranh, rủi ro tín dụng và kỳ vọng.</p>
<p>Lãi suất thấp hơn có thể khuyến khích vay và chi tiêu, nhưng nếu doanh nghiệp và hộ gia đình thiếu niềm tin, tín dụng chưa chắc tăng mạnh. Lãi suất cao hơn có thể giúp giảm áp lực giá nhưng cũng làm chi phí vốn và hoạt động kinh tế chịu sức ép.</p>
<h2>Nghiệp vụ thị trường mở và thanh khoản</h2>
<p>Thông qua nghiệp vụ thị trường mở, cơ quan tiền tệ mua hoặc bán giấy tờ có giá với các tổ chức tín dụng. Mua vào thường đưa thêm tiền vào hệ thống, còn bán ra hoặc giao dịch hút tiền làm thanh khoản giảm. Đây là công cụ có thể điều chỉnh tương đối linh hoạt theo điều kiện ngắn hạn.</p>
<p>Thanh khoản dồi dào không đồng nghĩa tiền sẽ tự động chảy vào mọi lĩnh vực. Ngân hàng vẫn đánh giá khả năng trả nợ, tài sản bảo đảm và hạn mức rủi ro. Vì vậy, cần phân biệt tiền trong hệ thống với tín dụng đến được nền kinh tế thực.</p>
<h2>Dự trữ bắt buộc và sức chịu đựng của ngân hàng</h2>
<p>Dự trữ bắt buộc yêu cầu tổ chức tín dụng giữ một phần nguồn tiền tại ngân hàng trung ương hoặc theo quy định. Tỷ lệ này ảnh hưởng đến lượng vốn có thể sử dụng cho hoạt động kinh doanh. Thay đổi dự trữ bắt buộc có thể tác động đến khả năng tạo tiền, nhưng thường được cân nhắc cùng mục tiêu an toàn và ổn định hệ thống.</p>
<p>Công cụ này không chỉ là nút tăng hoặc giảm tín dụng. Nếu ngân hàng đang thiếu vốn tự có hoặc nhu cầu vay yếu, giảm dự trữ cũng không bảo đảm tín dụng tăng tương ứng.</p>
<h2>Điều kiện tín dụng và các kênh truyền dẫn</h2>
<p>Chính sách truyền qua kênh lãi suất, kênh tín dụng, kênh tỷ giá và kênh kỳ vọng. Lãi suất thay đổi ảnh hưởng đến giá trị hiện tại của tài sản; tiêu chuẩn cấp tín dụng ảnh hưởng đến khả năng doanh nghiệp tiếp cận vốn; tỷ giá thay đổi chi phí nhập khẩu và sức cạnh tranh; còn thông điệp chính sách định hình quyết định của thị trường.</p>
<p>Độ trễ truyền dẫn có thể kéo dài. Một khoản vay ký hôm nay có thể chỉ ảnh hưởng đến đầu tư trong các quý sau. Tương tự, một thay đổi lãi suất chưa chắc lập tức làm lạm phát hoặc tăng trưởng đổi hướng.</p>
<h2>Đọc chính sách qua nhiều tín hiệu</h2>
<p>Không nên chỉ nhìn một mức lãi suất. Cần theo dõi hoạt động thị trường mở, thanh khoản liên ngân hàng, tăng trưởng tín dụng, tiền gửi, tỷ giá và thông điệp chính thức. Các công cụ có thể được phối hợp theo mục tiêu khác nhau, chẳng hạn hỗ trợ thanh khoản ngắn hạn nhưng vẫn kiểm soát rủi ro tín dụng.</p>
<p>Quan trọng nữa là phân biệt mục tiêu với kết quả. Một chương trình cung cấp thanh khoản có thể giúp thị trường tiền tệ vận hành thông suốt, nhưng không thay thế việc xử lý nợ xấu hoặc củng cố vốn ngân hàng. Một định hướng hỗ trợ tín dụng cũng cần đi cùng tiêu chuẩn thẩm định để tránh chuyển khó khăn hiện tại thành rủi ro trong tương lai.</p>
<p>Nhà đầu tư nên đọc thông điệp theo kịch bản: điều gì xảy ra nếu lạm phát dai dẳng, nếu tăng trưởng yếu hơn hoặc nếu tỷ giá chịu áp lực? Cách đọc này hữu ích hơn việc dự đoán một công cụ đơn lẻ sẽ làm giá tài sản tăng hay giảm.</p>
<h2>Kết luận</h2>
<p>Chính sách tiền tệ vận hành như một hệ thống nhiều bánh răng. Lãi suất, nghiệp vụ thị trường mở và dự trữ bắt buộc tác động đến thanh khoản và kỳ vọng, nhưng kết quả còn phụ thuộc vào sức khỏe ngân hàng, nhu cầu vay và bối cảnh kinh tế. Đây là nội dung giáo dục, không phải dự báo chính sách hay lời khuyên đầu tư.</p>
HTML,
		),
		array(
			'title' => 'P/E, P/B và ROE: Đọc các chỉ số định giá cổ phiếu như thế nào?',
			'slug' => 'pe-pb-roe-doc-chi-so-dinh-gia-co-phieu',
			'category' => 'chung-khoan',
			'excerpt' => 'P/E, P/B và ROE chỉ có ý nghĩa khi được đọc cùng chất lượng lợi nhuận, mô hình kinh doanh, rủi ro và nhóm doanh nghiệp tương đồng.',
			'content' => <<<'HTML'
<p>Các chỉ số P/E, P/B và ROE thường xuất hiện trong bảng phân tích cổ phiếu. Chúng giúp nhà đầu tư đặt giá thị trường cạnh lợi nhuận hoặc vốn chủ sở hữu, nhưng không phải là nút bấm “rẻ” hay “đắt”. Mỗi chỉ số trả lời một câu hỏi khác nhau và cần được đặt trong đúng bối cảnh.</p>
<h2>P/E đo giá so với lợi nhuận</h2>
<p>P/E, hay hệ số giá trên lợi nhuận, được tính khái quát bằng giá cổ phiếu chia cho lợi nhuận trên mỗi cổ phiếu. P/E 10 lần có thể hiểu là giá thị trường đang bằng 10 lần lợi nhuận mỗi cổ phần của một giai đoạn nhất định. P/E quá khứ dùng lợi nhuận đã công bố; P/E dự phóng dùng lợi nhuận kỳ vọng.</p>
<p>Ví dụ giả định: một cổ phiếu có giá 50.000 đồng và lợi nhuận trên mỗi cổ phần là 5.000 đồng thì P/E bằng 10 lần. Nếu lợi nhuận giảm một nửa nhưng giá không đổi, P/E tăng lên 20 lần mà doanh nghiệp không hề rẻ hơn. Điều này cho thấy cần kiểm tra chất lượng và tính bền vững của mẫu số.</p>
<h2>P/B đặt giá cạnh giá trị sổ sách</h2>
<p>P/B là giá cổ phiếu chia cho giá trị sổ sách trên mỗi cổ phiếu. Chỉ số này thường hữu ích với ngân hàng, bảo hiểm hoặc doanh nghiệp có tài sản được ghi nhận tương đối rõ. P/B thấp có thể phản ánh cơ hội, nhưng cũng có thể phản ánh tài sản kém chất lượng, lợi nhuận thấp hoặc rủi ro cần tăng vốn.</p>
<p>Ví dụ giả định: nếu giá cổ phiếu là 30.000 đồng và giá trị sổ sách mỗi cổ phần là 40.000 đồng, P/B là 0,75 lần. Muốn kết luận hấp dẫn, cần hỏi vốn tạo ra lợi nhuận bao nhiêu, tài sản có khả năng giảm giá không và phương pháp ghi nhận có đáng tin cậy không.</p>
<h2>ROE đo hiệu quả vốn chủ sở hữu</h2>
<p>ROE, tức tỷ suất sinh lời trên vốn chủ sở hữu, thường được tính bằng lợi nhuận sau thuế chia cho vốn chủ sở hữu bình quân. ROE cho biết mỗi đơn vị vốn của cổ đông tạo ra bao nhiêu lợi nhuận trong kỳ. Tuy nhiên, ROE cao có thể đến từ biên lợi nhuận tốt, tài sản sinh lời hiệu quả hoặc đòn bẩy lớn.</p>
<p>Ví dụ giả định: doanh nghiệp tạo lợi nhuận 12 tỷ đồng trên vốn chủ sở hữu bình quân 100 tỷ đồng có ROE 12%. Nếu doanh nghiệp vay thêm và dùng đòn bẩy để tạo lợi nhuận, ROE có thể tăng nhưng rủi ro tài chính cũng tăng. Vì vậy, ROE cần đi cùng nợ, dòng tiền và khả năng chịu suy giảm lợi nhuận.</p>
<h2>Đọc ba chỉ số cùng nhau</h2>
<p>P/E phù hợp hơn khi lợi nhuận dương và tương đối ổn định. P/B có thể bổ sung góc nhìn về tài sản và vốn. ROE giúp đánh giá doanh nghiệp tạo giá trị trên số vốn đó như thế nào. Một doanh nghiệp P/B thấp nhưng ROE thấp kéo dài chưa chắc là món hời; một doanh nghiệp P/E cao có thể được thị trường kỳ vọng tăng trưởng, nhưng giá sẽ nhạy cảm nếu kỳ vọng không thành hiện thực.</p>
<h2>Những giới hạn cần nhớ</h2>
<p>Lợi nhuận kế toán có thể chịu ảnh hưởng bởi khoản bất thường, chu kỳ ngành hoặc chính sách ghi nhận. P/E bị hạn chế khi doanh nghiệp lỗ; P/B phụ thuộc chất lượng định giá tài sản; ROE có thể bị méo bởi mua cổ phiếu quỹ, đòn bẩy hoặc vốn chủ sở hữu thấp. So sánh phải dùng doanh nghiệp cùng ngành, mô hình và giai đoạn chu kỳ.</p>
<p>Cũng cần thống nhất mẫu số khi so sánh. P/E của một doanh nghiệp có thể dùng lợi nhuận bốn quý gần nhất, trong khi một bảng khác dùng lợi nhuận dự phóng. ROE có thể tính trên vốn đầu kỳ, cuối kỳ hoặc bình quân. Nếu không kiểm tra định nghĩa, sự khác biệt nhìn thấy có thể đến từ phương pháp tính chứ không phải chất lượng doanh nghiệp.</p>
<p>Định giá còn nhạy với kỳ vọng lãi suất, tăng trưởng và phần bù rủi ro. Một mức P/E thấp có thể hợp lý trong ngành chu kỳ đang ở đỉnh lợi nhuận; một mức P/E cao có thể hợp lý hơn nếu doanh nghiệp có dòng tiền bền vững, nhưng chỉ khi các giả định tăng trưởng có cơ sở.</p>
<p>Các con số trong bài chỉ là ví dụ giả định để minh họa công thức. Chỉ số định giá là công cụ sàng lọc, không thay thế phân tích doanh nghiệp và không phải lời khuyên đầu tư cá nhân.</p>
HTML,
		),
		array(
			'title' => 'Đọc báo cáo tài chính doanh nghiệp: Bắt đầu từ đâu?',
			'slug' => 'cach-doc-bao-cao-tai-chinh-doanh-nghiep',
			'category' => 'chung-khoan',
			'excerpt' => 'Bắt đầu từ ba báo cáo chính, nối doanh thu với dòng tiền và bảng cân đối, rồi tìm các dấu hiệu cần kiểm tra sâu hơn.',
			'content' => <<<'HTML'
<p>Báo cáo tài chính là bộ dữ liệu nền tảng để hiểu một doanh nghiệp kiếm tiền, sử dụng vốn và chuyển lợi nhuận thành tiền mặt như thế nào. Người mới thường bắt đầu bằng doanh thu hoặc lợi nhuận, nhưng cách đọc hiệu quả hơn là đi qua ba báo cáo chính rồi nối các con số giữa chúng. Mục tiêu không phải nhớ mọi chỉ tiêu mà là đặt được câu hỏi đúng.</p>
<h2>Bảng cân đối kế toán cho biết doanh nghiệp đang có gì</h2>
<p>Bảng cân đối kế toán gồm tài sản, nợ phải trả và vốn chủ sở hữu tại một thời điểm. Tài sản có thể là tiền, phải thu, hàng tồn kho, nhà máy hoặc tài sản vô hình. Nợ cho biết nghĩa vụ với ngân hàng, nhà cung cấp và các bên khác. Chênh lệch giữa tài sản và nợ là vốn của cổ đông.</p>
<p>Hãy xem tiền và các khoản phải thu thay đổi thế nào khi doanh thu tăng. Phải thu tăng nhanh hơn doanh thu có thể cần giải thích về điều khoản bán hàng hoặc khả năng thu tiền. Hàng tồn kho tăng có thể phục vụ mở rộng, nhưng cũng có thể báo hiệu hàng bán chậm hoặc nguy cơ trích lập.</p>
<h2>Báo cáo kết quả kinh doanh phản ánh hiệu quả trong kỳ</h2>
<p>Báo cáo kết quả kinh doanh đi từ doanh thu đến lợi nhuận sau thuế qua giá vốn, chi phí bán hàng, quản lý, chi phí tài chính và thuế. Cần phân biệt tăng trưởng doanh thu với tăng trưởng lợi nhuận. Biên lợi nhuận gộp cho thấy sức mạnh giá bán và chi phí trực tiếp; biên hoạt động cho thấy hiệu quả sau chi phí vận hành.</p>
<p>Đừng bỏ qua thu nhập hoặc chi phí bất thường. Một khoản thanh lý tài sản, hoàn nhập dự phòng hay lợi nhuận từ giao dịch một lần có thể làm kết quả đẹp hơn nhưng không lặp lại. Khi dự phóng, nên tách phần cốt lõi khỏi phần không thường xuyên.</p>
<h2>Báo cáo lưu chuyển tiền tệ kiểm tra chất lượng lợi nhuận</h2>
<p>Dòng tiền từ hoạt động kinh doanh cho biết tiền thu từ hoạt động chính sau những thay đổi vốn lưu động. Dòng tiền đầu tư thường bao gồm mua bán tài sản và đầu tư dài hạn. Dòng tiền tài chính phản ánh vay, trả nợ, phát hành cổ phần hoặc cổ tức.</p>
<p>Doanh nghiệp có lợi nhuận nhưng dòng tiền kinh doanh âm kéo dài cần được phân tích kỹ. Có thể doanh nghiệp đang mở rộng và vốn lưu động tạm thời tăng, nhưng cũng có thể lợi nhuận chưa chuyển thành tiền. Dòng tiền tự do thường được xem xét sau khi trừ chi tiêu vốn cần thiết, nhưng cách tính cần nhất quán.</p>
<h2>Nối ba báo cáo với nhau</h2>
<p>Lợi nhuận làm tăng vốn chủ sở hữu sau khi điều chỉnh cổ tức, nhưng không nhất thiết làm tiền tăng tương ứng. Mua máy móc làm giảm tiền và tăng tài sản cố định; chi phí khấu hao sau đó giảm lợi nhuận theo thời gian nhưng không phải dòng tiền chi ra ngay trong kỳ. Vay mới tăng tiền và nợ; trả nợ làm giảm cả hai.</p>
<p>Việc nối các chuyển động này giúp phát hiện câu chuyện không nhất quán: lợi nhuận tăng nhưng phải thu và tồn kho tăng quá nhanh, hoặc doanh nghiệp liên tục vay để bù dòng tiền vận hành.</p>
<h2>Một số dấu hiệu cần kiểm tra thêm</h2>
<ul><li>Doanh thu tăng nhưng tiền thu từ khách hàng không theo kịp.</li><li>Khoản phải thu, tồn kho hoặc chi phí trả trước tăng bất thường.</li><li>Nợ ngắn hạn tăng trong khi tiền mặt và dòng tiền hoạt động yếu.</li><li>Lợi nhuận phụ thuộc lớn vào khoản bất thường hoặc hoàn nhập.</li><li>Giao dịch với bên liên quan, cam kết ngoài bảng cân đối hoặc thay đổi chính sách kế toán cần đọc kỹ.</li></ul>
<h2>Trình tự đọc thực tế</h2>
<p>Có thể bắt đầu bằng phần ý kiến của kiểm toán và các điểm nhấn trong thuyết minh, sau đó xem xu hướng ba đến năm kỳ nếu dữ liệu cho phép. Tiếp theo, đối chiếu doanh thu với phải thu, lợi nhuận với dòng tiền và nợ vay với chi phí lãi. Cuối cùng, quay lại ngành để xem thay đổi là riêng của doanh nghiệp hay phản ánh chu kỳ chung.</p>
<p>Đọc báo cáo tài chính không phải là tìm một con số hoàn hảo. Đây là quá trình đặt giả thuyết, tìm bằng chứng ủng hộ và chủ động tìm dữ liệu có thể bác bỏ giả thuyết đó. Cách làm này giúp hạn chế việc chỉ chọn những con số phù hợp với niềm tin ban đầu.</p>
<p>Không dấu hiệu nào tự động chứng minh sai phạm. Chúng chỉ là điểm bắt đầu để đọc thuyết minh, so sánh nhiều kỳ và đối chiếu với doanh nghiệp cùng ngành. Báo cáo tài chính là dữ liệu quá khứ, không phải bảo đảm cho kết quả tương lai hay lời khuyên đầu tư cá nhân.</p>
HTML,
		),
		array(
			'title' => 'Thanh khoản thị trường chứng khoán quan trọng như thế nào?',
			'slug' => 'thanh-khoan-thi-truong-chung-khoan',
			'category' => 'chung-khoan',
			'excerpt' => 'Thanh khoản quyết định mức độ dễ mua bán và chi phí thực hiện giao dịch; cần phân biệt thanh khoản thị trường với sức khỏe tiền mặt của doanh nghiệp.',
			'content' => <<<'HTML'
<p>Thanh khoản thị trường chứng khoán mô tả mức độ dễ dàng mua hoặc bán một tài sản với khối lượng hợp lý, trong thời gian ngắn và không làm giá biến động quá mạnh. Một cổ phiếu có thể hấp dẫn về mặt cơ bản nhưng khó giao dịch nếu thanh khoản thấp. Ngược lại, giao dịch sôi động không tự động chứng minh doanh nghiệp tốt.</p>
<h2>Khối lượng và giá trị giao dịch</h2>
<p>Khối lượng cho biết số cổ phiếu được trao đổi; giá trị giao dịch cho biết quy mô tiền. Cần xem cả hai cùng giá cổ phiếu vì một mã giá cao và một mã giá thấp có thể có khối lượng khác nhau nhưng giá trị giao dịch tương đương. Một phiên tăng khối lượng đột biến chỉ là tín hiệu cần tìm hiểu, không phải kết luận về xu hướng.</p>
<p>Thanh khoản nên được đánh giá qua nhiều phiên và nhiều điều kiện thị trường. Cổ phiếu có thể giao dịch tốt trong lúc hưng phấn nhưng trở nên khó bán khi thị trường căng thẳng.</p>
<h2>Chênh lệch giá mua bán và độ sâu thị trường</h2>
<p>Chênh lệch giá mua và giá bán, thường gọi là bid-ask spread, là một chi phí giao dịch ẩn. Spread hẹp thường cho thấy người mua và người bán gần nhau hơn; spread rộng làm chi phí vào ra lớn hơn. Độ sâu thị trường cho biết có bao nhiêu lệnh chờ ở các mức giá khác nhau, giúp đánh giá một lệnh lớn có thể làm giá dịch chuyển bao nhiêu.</p>
<p>Thông tin bảng giá chỉ là ảnh chụp tại một thời điểm. Lệnh có thể bị hủy hoặc thay đổi, nên không nên xem toàn bộ độ sâu hiển thị là thanh khoản chắc chắn.</p>
<h2>Trượt giá và rủi ro thanh khoản</h2>
<p>Trượt giá xảy ra khi giá thực hiện khác giá dự kiến, đặc biệt khi đặt lệnh lớn hoặc dùng lệnh thị trường. Ví dụ giả định, một nhà đầu tư muốn mua 10.000 cổ phiếu nhưng chỉ có 3.000 cổ phiếu ở mức giá đầu tiên; phần còn lại phải khớp ở các mức cao hơn. Chi phí chênh lệch đó có thể làm thay đổi hiệu quả giao dịch.</p>
<p>Rủi ro thanh khoản còn là việc không thể bán nhanh khi cần tiền, hoặc phải chấp nhận giá thấp để thoát vị thế. Rủi ro này quan trọng với danh mục dùng đòn bẩy, nhà đầu tư có thời hạn ngắn và tài sản cần tái cân bằng thường xuyên.</p>
<h2>Khác với thanh khoản tài chính của doanh nghiệp</h2>
<p>Thanh khoản thị trường nói về khả năng giao dịch cổ phiếu. Thanh khoản doanh nghiệp nói về khả năng đáp ứng nghĩa vụ ngắn hạn bằng tiền và tài sản dễ chuyển thành tiền. Hai khái niệm liên quan nhưng không giống nhau. Cổ phiếu giao dịch nhiều không bảo đảm doanh nghiệp có tiền trả nợ; doanh nghiệp có bảng cân đối lành mạnh cũng có thể có cổ phiếu ít giao dịch.</p>
<h2>Cách xem thanh khoản thận trọng</h2>
<p>Nên kết hợp giá trị giao dịch bình quân, spread, độ sâu, tỷ lệ cổ phiếu tự do chuyển nhượng và lịch sử biến động khi thị trường xấu. Cũng cần xem quy mô vị thế so với thanh khoản thay vì áp dụng một ngưỡng giống nhau cho mọi người. Một giao dịch nhỏ với người này có thể là giao dịch rất lớn với người khác.</p>
<p>Thanh khoản còn thay đổi theo thời điểm trong ngày, ngày công bố thông tin và trạng thái thị trường. Lệnh giới hạn giúp kiểm soát mức giá nhưng có thể không được khớp; lệnh thị trường tăng khả năng khớp nhưng có thể chịu trượt giá. Hiểu sự đánh đổi này giúp người giao dịch chọn cách thực hiện phù hợp với mục tiêu.</p>
<p>Với danh mục dài hạn, thanh khoản vẫn cần được xem xét vì có thể phải bán để tái cân bằng, đáp ứng nhu cầu tiền hoặc xử lý luận điểm sai. Không nên dùng toàn bộ giá trị giao dịch của thị trường để suy ra một cổ phiếu cụ thể luôn dễ mua bán.</p>
<p>Thanh khoản giúp quản lý cách thực hiện giao dịch và rủi ro thoát vị thế, nhưng không thay thế phân tích doanh nghiệp. Nội dung này mang tính giáo dục, không phải khuyến nghị mua bán.</p>
HTML,
		),
		array(
			'title' => 'Lãi kép hoạt động như thế nào và vì sao thời gian đầu tư quan trọng?',
			'slug' => 'lai-kep-va-thoi-gian-dau-tu',
			'category' => 'kien-thuc-tai-chinh',
			'excerpt' => 'Lãi kép biến lợi nhuận được tái đầu tư thành nền tảng cho các kỳ sau, nhưng kết quả thực tế còn phụ thuộc biến động, lạm phát, phí và thời gian.',
			'content' => <<<'HTML'
<p>Lãi kép là cơ chế trong đó lợi nhuận của một kỳ được nhập vào số vốn và tiếp tục tạo ra lợi nhuận ở các kỳ sau. Điểm quan trọng không nằm ở một mức sinh lời thần kỳ mà ở việc lợi nhuận được tái đầu tư, thời gian đủ dài và chi phí không bào mòn quá nhiều. Lãi kép có thể hỗ trợ tích lũy, nhưng không biến một khoản đầu tư rủi ro thành kết quả chắc chắn.</p>
<h2>Từ lãi đơn đến lãi kép</h2>
<p>Với lãi đơn, lợi nhuận chỉ tính trên vốn ban đầu. Với lãi kép, lợi nhuận được cộng vào vốn. Ví dụ giả định: 100 đơn vị tăng 10% trong kỳ đầu thành 110 đơn vị; nếu kỳ sau tiếp tục tăng 10%, số tiền thành 121 thay vì 120 theo cách chỉ tính trên vốn gốc. Phần chênh lệch đến từ 10 đơn vị lợi nhuận đã được tái đầu tư.</p>
<p>Công thức minh họa là giá trị tương lai bằng vốn ban đầu nhân với (1 + tỷ lệ sinh lời) lũy thừa số kỳ. Trong thực tế, tỷ lệ sinh lời hiếm khi cố định và có thể âm ở một số giai đoạn.</p>
<h2>Thời gian tạo ra khác biệt</h2>
<p>Thời gian dài làm số kỳ tái đầu tư tăng, nên tác động của lãi kép lớn dần. Thói quen đóng góp đều đặn cũng có thể quan trọng hơn việc cố đoán đúng một thời điểm. Tuy nhiên, thời gian không loại bỏ rủi ro thị trường; tài sản vẫn có thể giảm giá mạnh ngay trước lúc cần sử dụng tiền.</p>
<p>Thời hạn đầu tư nên gắn với mục tiêu, khả năng chịu biến động và nhu cầu thanh khoản. Tiền cần dùng trong ngắn hạn không nên được đặt vào tài sản chỉ phù hợp với một chân trời dài.</p>
<h2>Lạm phát làm giảm sức mua</h2>
<p>Lãi kép thường được tính theo giá trị danh nghĩa, trong khi người tiết kiệm quan tâm đến sức mua. Nếu danh mục tăng 6% trong một năm nhưng mặt bằng giá tăng 4%, mức tăng sức mua gần đúng chỉ khoảng 2% trước thuế và phí. Đây là phép minh họa, không phải dự báo hay mức sinh lời bảo đảm.</p>
<h2>Phí và thuế có thể làm thay đổi kết quả</h2>
<p>Phí quản lý, phí giao dịch, chênh lệch mua bán và thuế đều làm giảm phần vốn được tái đầu tư. Phí nhỏ nhưng lặp lại nhiều năm có thể tạo khoảng cách đáng kể vì nó làm giảm cả vốn hiện tại lẫn lợi nhuận của các kỳ sau. Khi so sánh sản phẩm, nên đọc tổng chi phí thay vì chỉ nhìn mức lợi nhuận quảng bá.</p>
<h2>Không nhầm giả định với cam kết</h2>
<p>Một bảng tính lãi kép thường dùng tỷ lệ cố định để minh họa. Thị trường thực tế biến động, lợi nhuận có thể không đều và không có bảo đảm đạt đúng con số trong ví dụ. Cũng cần tính đến việc nộp thêm tiền, rút tiền, thời điểm tái đầu tư và rủi ro mất vốn.</p>
<h2>Đóng góp đều đặn và tái cân bằng</h2>
<p>Đóng góp đều đặn có thể giúp giảm phụ thuộc vào một thời điểm mua duy nhất, nhưng không bảo đảm mua được giá thấp. Khi danh mục thay đổi tỷ trọng vì giá tài sản biến động, tái cân bằng có thể đưa rủi ro về gần kế hoạch ban đầu. Việc tái cân bằng cần cân nhắc thuế, phí và điều kiện thị trường, không nên thực hiện máy móc.</p>
<p>Trước khi dùng một giả định lãi kép, hãy viết rõ vốn ban đầu, khoản đóng góp, thời hạn, mức phí, lạm phát và kịch bản lợi nhuận. So sánh nhiều kịch bản thận trọng, cơ sở và bất lợi sẽ phản ánh sự không chắc chắn tốt hơn một đường tăng đều.</p>
<p>Lãi kép là nguyên tắc hữu ích để hiểu giá trị của tiết kiệm đều đặn và thời gian, không phải lời hứa về lợi nhuận. Đây là nội dung giáo dục, không phải tư vấn tài chính cá nhân.</p>
HTML,
		),
		array(
			'title' => 'Trái phiếu và cổ phiếu khác nhau như thế nào?',
			'slug' => 'trai-phieu-va-co-phieu-khac-nhau-the-nao',
			'category' => 'kien-thuc-tai-chinh',
			'excerpt' => 'Cổ phiếu đại diện cho quyền sở hữu, trái phiếu là một khoản cho vay; hai loại tài sản khác nhau về dòng tiền, ưu tiên thanh toán và rủi ro.',
			'content' => <<<'HTML'
<p>Cổ phiếu và trái phiếu đều có thể được giao dịch trên thị trường vốn, nhưng bản chất quyền lợi rất khác nhau. Mua cổ phiếu thường là mua một phần quyền sở hữu doanh nghiệp; mua trái phiếu là cho tổ chức phát hành vay theo điều khoản đã thỏa thuận. Hiểu khác biệt này giúp đặt đúng kỳ vọng về dòng tiền và rủi ro.</p>
<h2>Quyền sở hữu và quyền đòi nợ</h2>
<p>Cổ đông có thể hưởng lợi nếu doanh nghiệp tăng trưởng, nhưng thường không có quyền đòi một khoản tiền cố định. Cổ tức phụ thuộc quyết định phân phối và khả năng tạo tiền. Trái chủ có quyền nhận lãi và gốc theo hợp đồng, nhưng việc thanh toán phụ thuộc khả năng trả nợ của bên phát hành.</p>
<p>Khi doanh nghiệp gặp khó khăn, chủ nợ thường có thứ tự ưu tiên cao hơn cổ đông trong quá trình thanh lý. Điều đó không có nghĩa trái phiếu luôn an toàn; nếu tài sản không đủ hoặc tổ chức phát hành vỡ nợ, trái chủ vẫn có thể mất một phần hoặc toàn bộ vốn.</p>
<h2>Dòng tiền và cách định giá</h2>
<p>Trái phiếu thường có lịch trả lãi và hoàn gốc được nêu trước, dù một số loại có lãi suất thả nổi hoặc điều khoản đặc biệt. Giá trái phiếu trên thị trường thay đổi khi lợi suất, lạm phát kỳ vọng và rủi ro tín dụng thay đổi. Giá và lợi suất của trái phiếu đang lưu hành thường đi ngược chiều.</p>
<p>Cổ phiếu không có ngày đáo hạn cố định. Định giá thường dựa trên lợi nhuận, dòng tiền, tăng trưởng, tài sản và mức sinh lời yêu cầu. Giá có thể biến động mạnh vì kỳ vọng tương lai thay đổi, ngay cả khi doanh nghiệp chưa công bố dòng tiền mới.</p>
<h2>Rủi ro, thanh khoản và lạm phát</h2>
<p>Cổ phiếu chịu rủi ro kinh doanh, cạnh tranh và định giá. Trái phiếu chịu rủi ro tín dụng, rủi ro lãi suất, rủi ro tái đầu tư và thanh khoản. Trái phiếu kỳ hạn dài thường nhạy cảm hơn với thay đổi lợi suất. Dòng tiền cố định cũng có thể mất sức mua khi lạm phát tăng.</p>
<p>Thanh khoản của cả hai loại tài sản phụ thuộc tổ chức phát hành, quy mô thị trường, thời điểm và điều kiện chung. Một tài sản có giá niêm yết nhưng vẫn có thể khó bán ở mức giá mong muốn khi thị trường căng thẳng.</p>
<h2>Vai trò trong danh mục</h2>
<p>Cổ phiếu thường được dùng để tìm kiếm tăng trưởng dài hạn, còn trái phiếu có thể cung cấp dòng tiền theo hợp đồng và giúp đa dạng hóa nguồn rủi ro. Tuy vậy, mức độ giảm biến động không cố định: khi lãi suất, lạm phát hoặc rủi ro tín dụng thay đổi, cổ phiếu và trái phiếu có thể cùng giảm.</p>
<p>Tỷ trọng phù hợp phụ thuộc mục tiêu, thời hạn, nhu cầu tiền và khả năng chịu lỗ. Không nên suy ra một phân bổ chung cho mọi người từ một bảng so sánh.</p>
<h2>Đọc điều khoản trước khi mua</h2>
<p>Với trái phiếu, cần xem tổ chức phát hành, tài sản bảo đảm, kỳ hạn, lãi suất, lịch trả, điều khoản mua lại và các cam kết liên quan. Với cổ phiếu, cần xem quyền biểu quyết, chính sách cổ tức, cơ cấu sở hữu và khả năng pha loãng. Tên gọi “thu nhập cố định” cũng không đồng nghĩa với không có rủi ro.</p>
<p>Giá thị trường của cả hai tài sản có thể khác xa giá trị ghi trên hợp đồng hoặc giá trị sổ sách. Một quyết định cân bằng cần xem cả chất lượng dòng tiền, giá mua, thanh khoản và khả năng nắm giữ qua giai đoạn biến động.</p>
<h2>Kết luận</h2>
<p>Cổ phiếu trao quyền sở hữu và cơ hội hưởng thành quả kinh doanh; trái phiếu trao quyền nhận dòng tiền theo hợp đồng và có thứ tự ưu tiên khác. Trước khi mua, cần đọc điều khoản phát hành, chất lượng tổ chức phát hành, định giá, thanh khoản và rủi ro. Bài viết chỉ mang tính giáo dục, không phải lời khuyên đầu tư.</p>
HTML,
		),
		array(
			'title' => 'Quản trị rủi ro khi đầu tư: Phân bổ vốn và đa dạng hóa',
			'slug' => 'quan-tri-rui-ro-dau-tu-phan-bo-von-da-dang-hoa',
			'category' => 'kien-thuc-tai-chinh',
			'excerpt' => 'Phân bổ vốn, giới hạn vị thế và đa dạng hóa giúp quản lý rủi ro tập trung, nhưng không thể loại bỏ mọi khoản lỗ hoặc biến động.',
			'content' => <<<'HTML'
<p>Quản trị rủi ro khi đầu tư không có nghĩa là loại bỏ mọi khả năng thua lỗ. Mục tiêu thực tế hơn là giới hạn mức thiệt hại có thể làm hỏng kế hoạch tài chính, duy trì khả năng hành động và tránh để một sai lầm duy nhất chi phối toàn bộ tài sản. Phân bổ vốn và đa dạng hóa là hai công cụ quan trọng trong quá trình đó.</p>
<h2>Đa dạng hóa để giảm rủi ro tập trung</h2>
<p>Đa dạng hóa là phân bổ tài sản vào các khoản đầu tư có yếu tố rủi ro không hoàn toàn giống nhau. Có thể đa dạng hóa theo doanh nghiệp, ngành, loại tài sản, thời hạn hoặc khu vực. Nếu một khoản đầu tư gặp vấn đề riêng, tác động lên toàn bộ danh mục có thể thấp hơn khi vốn chỉ tập trung vào một nơi.</p>
<p>Đa dạng hóa không đồng nghĩa mua thật nhiều mã. Mười cổ phiếu cùng phụ thuộc một chu kỳ hoặc một nguồn doanh thu có thể vẫn là một vị thế tập trung. Cần xem các yếu tố rủi ro chung thay vì chỉ đếm số lượng tài sản.</p>
<h2>Phân bổ vốn và quy mô vị thế</h2>
<p>Phân bổ vốn trả lời câu hỏi mỗi nhóm tài sản hoặc mỗi khoản đầu tư chiếm bao nhiêu phần danh mục. Quy mô vị thế nên cân nhắc mức biến động, khả năng mất vốn, độ tin cậy của luận điểm và thời hạn nắm giữ. Ví dụ giả định, nếu một khoản có thể giảm mạnh và người đầu tư không chịu được mức giảm đó, việc đặt toàn bộ vốn vào khoản này là không phù hợp dù luận điểm nghe có vẻ hấp dẫn.</p>
<p>Giới hạn vị thế cũng giúp tránh quyết định theo cảm xúc. Tuy nhiên, một tỷ lệ cố định không phù hợp với mọi người; cần gắn nó với dòng tiền, quỹ dự phòng và nghĩa vụ tài chính.</p>
<h2>Khẩu vị rủi ro và khả năng chịu rủi ro</h2>
<p>Khẩu vị rủi ro là mức biến động một người sẵn sàng chấp nhận về mặt tâm lý. Khả năng chịu rủi ro liên quan đến thu nhập, nợ, thời hạn và nhu cầu sử dụng tiền. Hai yếu tố này có thể khác nhau: một người thích mạo hiểm nhưng cần tiền trong vài tháng vẫn có khả năng chịu rủi ro thấp cho mục tiêu đó.</p>
<h2>Drawdown và kế hoạch trong giai đoạn xấu</h2>
<p>Drawdown là mức giảm từ đỉnh danh mục xuống đáy trước khi phục hồi. Một mức giảm lớn không chỉ tạo áp lực tâm lý mà còn cần mức tăng lớn hơn để quay lại điểm ban đầu. Ví dụ giả định, danh mục giảm 50% cần tăng 100% từ mức còn lại mới hòa vốn.</p>
<p>Trước khi đầu tư, nên xác định khi nào tái cân bằng, phần tiền nào không được dùng cho tài sản biến động và hành động nào sẽ được thực hiện khi luận điểm thay đổi. Kế hoạch không bảo đảm tránh lỗ, nhưng giúp giảm phản ứng vội vàng.</p>
<h2>Đa dạng hóa vẫn có giới hạn</h2>
<p>Trong một cú sốc toàn thị trường, nhiều tài sản có thể cùng giảm. Đa dạng hóa cũng không bảo vệ trước gian lận, thanh khoản kém, rủi ro tiền tệ hoặc lựa chọn tài sản chất lượng thấp. Phân bổ vốn chỉ hữu ích khi tài sản được hiểu, chi phí được kiểm soát và danh mục được theo dõi phù hợp.</p>
<h2>Chi phí và kỷ luật theo dõi</h2>
<p>Mỗi giao dịch, sản phẩm hoặc lần tái cân bằng đều có thể phát sinh phí, thuế và chênh lệch giá. Chi phí cao làm giảm vốn tiếp tục được đầu tư và làm ngưỡng phục hồi sau một khoản lỗ cao hơn. Nên ghi lại lý do mua, tỷ trọng, rủi ro chính và điều kiện xem xét lại thay vì chỉ theo dõi giá mỗi ngày.</p>
<p>Đa dạng hóa cũng cần được rà soát khi thu nhập, nợ hoặc mục tiêu thay đổi. Một danh mục phù hợp với giai đoạn tích lũy có thể không phù hợp khi sắp cần tiền. Điều chỉnh chậm và có kế hoạch thường dễ kiểm soát hơn phản ứng sau một phiên biến động mạnh.</p>
<p>Quản trị rủi ro là quá trình liên tục: cập nhật mục tiêu, kiểm tra tương quan, xem lại dòng tiền và điều chỉnh khi hoàn cảnh thay đổi. Nội dung này mang tính giáo dục, không phải kế hoạch đầu tư cá nhân.</p>
HTML,
		),
	);
}

function vn_finance_initial_content_seed() {
	if ( ! get_option( 'timezone_string' ) ) {
		update_option( 'timezone_string', 'Asia/Ho_Chi_Minh' );
	}

	$category_ids = array();
	foreach ( vn_finance_initial_content_items() as $category ) {
		$term = get_term_by( 'slug', $category['slug'], 'category' );
		if ( ! $term ) {
			$term = wp_insert_term( $category['name'], 'category', array( 'slug' => $category['slug'] ) );
			if ( is_wp_error( $term ) ) {
				continue;
			}
			$category_ids[ $category['slug'] ] = (int) $term['term_id'];
		} else {
			$category_ids[ $category['slug'] ] = (int) $term->term_id;
		}
	}

	foreach ( array_merge( vn_finance_initial_content_posts(), vn_finance_additional_content_posts() ) as $post ) {
		$existing = get_page_by_path( $post['slug'], OBJECT, 'post' );
		if ( $existing ) {
			continue;
		}
		if ( empty( $category_ids[ $post['category'] ] ) ) {
			continue;
		}

		wp_insert_post(
			array(
				'post_title' => $post['title'],
				'post_name' => $post['slug'],
				'post_content' => $post['content'],
				'post_excerpt' => $post['excerpt'],
				'post_status' => 'publish',
				'post_type' => 'post',
				'post_category' => array( $category_ids[ $post['category'] ] ),
			)
		);
	}
}

function vn_finance_initial_content_configure_urls() {
	$permalink_structure = '/%category%/%postname%/';
	$urls_configured = 'vn_finance_urls_configured_v1';

	if ( get_option( 'permalink_structure' ) !== $permalink_structure ) {
		update_option( 'permalink_structure', $permalink_structure );
	}
	if ( get_option( 'category_base' ) !== '' ) {
		update_option( 'category_base', '' );
	}
	flush_rewrite_rules( false );
	update_option( $urls_configured, 1 );
}

register_activation_hook( __FILE__, 'vn_finance_initial_content_seed' );
register_activation_hook( __FILE__, 'vn_finance_initial_content_configure_urls' );

function vn_finance_initial_content_maybe_configure_urls() {
	if ( ! get_option( 'vn_finance_urls_configured_v1' ) ) {
		vn_finance_initial_content_configure_urls();
	}
}
add_action( 'admin_init', 'vn_finance_initial_content_maybe_configure_urls' );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
		WP_CLI::add_command(
			'vn-finance seed',
			function () {
				vn_finance_initial_content_seed();
				vn_finance_initial_content_configure_urls();
				WP_CLI::success( 'Đã kiểm tra nội dung khởi tạo tiếng Việt; dữ liệu tồn tại được giữ nguyên.' );
			}
		);
}
