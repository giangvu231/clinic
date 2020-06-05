<?php

use Illuminate\Database\Seeder;

class MedicalbillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20190310',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20190310',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20190313',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168953',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI Trọng',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20190313',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp siêu âm',
            'mota' => '<ul><li> Si đa</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '2905',
            'accession_number' => rand(1, 526890),
            'exam_code' => '2905',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
        DB::table('medical_bills')->insert([
            'patient_id' => '11168952',
            'first_name' => 'TRỌNG',
            'last_name' => 'BÙI VĂN',
            'birth_date' => '11/11/1997',
            'sex' => 'M',
            'order_number' => '3038',
            'accession_number' => rand(1, 526890),
            'exam_code' => '3038',
            'exam_name' => 'Chụp Xquang cột sống ngực thẳng nghiêng hoặc chếch [số hóa 2 phim]',
            'schedule_date' => '20180924',
            'schedule_time' => '2203',
            'ordering_doctor_id' => '8888',
            'ordering_doctor_name' => 'Nguyễn Mạnh Hùng',
            'ordering_dept' => 'Chấn thương - Chỉnh Hình',
            'reason' => 'Gãy xương cẳng chân trái',
            'order_status' => '0',
            'visit_number' => '111',
            'exam_dept' => 'abc',
            'exam_room' => 'abc',
            'admit_datetime'=> '2018',
            'pregnant' => 'bbbbb',
            'sending_facility' => 'aaaaaaaaaa',
            'message_type' => 'none',
            'message_control_id' => '1',
            'study_status' => 2,
            'loai_thiet_bi'=> 'Chụp Xquang',
            'mota' => '<ul><li> Cột sống ngựccó đường cong sinh lý bình thường</li>
						<li>Thân các đốt sống  có chiều cao và đậm độ cản quang đồng đều. Không thấy lún xẹp, trượt thân đốt sống.</li>
						<li>Cung sau và các cuống sống không thấy tiêu hủy</li>
						<li>Mỏm ngang, mỏm gai các đốt sống không thấy bất thường.</li>
						<li>Không thấy hình gai xương, cầu xương.</li>
						<li>Khe đĩa đệm các đốt sống có chiều cao đồng đều, không thấy hẹp khu trú khe đĩa đệm.</li>
                        <li>Phần mềm quanh cột sống không thấy bất thường.</li>
                        </ul>',
			'ky_thuat' => 'Chụp Xquang cột sống',
			'ket_luan' => 'Hiện tại không thấy bất thường trên chụp XQ cột sống ngực.',
			'de_nghi' => 'Nằm viện',
			'radiologist_bacsidoc' => 'Bùi Đăng Tôn',
			'radiologist_id' => '01',
			

        ]);
    }
}
