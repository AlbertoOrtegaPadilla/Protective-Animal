import { Pipe, PipeTransform } from '@angular/core';

@Pipe({ name: 'Date' })
export class DatePipe implements PipeTransform {
  transform(value): string {
    const date = new Date(value * 1000);

    const day = date.getDate();
    let final_day = day.toString();
    if (day <= 9) {
      final_day = '0' + day;
    }

    const month = (date.getMonth() + 1);
    let final_month = month.toString();
    if (month <= 9) {
      final_month = '0' + month;
    }

    const result = final_day + '/' + final_month + '/' + date.getFullYear();
    return result;
  }
}
