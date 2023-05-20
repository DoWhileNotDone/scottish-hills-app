import { describe, it, expect } from 'vitest';
import { getHeightInMeters } from '@/functions';

describe('getHeightInMeters', () => {
    it('calculates height in meters correctly ', () => {
        expect(getHeightInMeters(3000)).toBe(914);
        expect(getHeightInMeters(4406)).toBe(1343);
        expect(getHeightInMeters(3530)).toBe(1076);
    });
});
