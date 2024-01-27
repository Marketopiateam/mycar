import 'package:flutter/material.dart';
// import 'package:flutter_screenutil/flutter_screenutil.dart';
// import 'package:mycar/constants/constants.dart';

// class CartPage extends StatelessWidget {
//   const CartPage({super.key});

//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       backgroundColor: kPrimary,
//       appBar: PreferredSize(preferredSize: Size.fromHeight(130.h), child: Container(height: 130,)),
//       body: SafeArea(
//          child:
//       ),);
//   }
// }

class CartPage extends StatelessWidget {
  const CartPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Cart'),
      ),
      body: const Center(
        child: Text('Cart Page'),
      ),
    );
  }
}
