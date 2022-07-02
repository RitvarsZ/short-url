import http from 'k6/http';
import { sleep, check } from 'k6';

export default function () {
  const link = 'https://google.com';
  let res = http.get('http://short-url.test');
  check(res, { 'homepage returned 200': (r) => r.status == 200 });
  sleep(1);

  res = res.submitForm({
    formSelector: 'form',
    fields: { long_url: link }
  });
  check(res, { 'form submit returned 200': (r) => r.status == 200 });
  sleep(1);

  res = res.clickLink({ selector: '#url', params: { redirects: 0 } })
  check(res, { 'redirected successfully': (r) => r.status == 302 });
}